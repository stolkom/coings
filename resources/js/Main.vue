<template>
    <div>
        <div v-if="token.length">
            <legend>Добавить валюту</legend>
            <form @submit.prevent="addExchangeRate()">
                <div class="form-row">
                    <div class="input-group mr-2">
                        <label class="required">Валюта</label>
                        <input type="text" value="" class="input" placeholder="USD" v-model="newRateData.currency" required>
                    </div>
                    <div class="input-group mr-2">
                        <label class="required">Дата</label>
                        <input type="text" value="" class="input" placeholder="01.03.2021" v-model="newRateDate" required>
                    </div>
                    <div class="input-group">
                        <label class="required">Время</label>
                        <input type="text" value="" class="input" placeholder="15:54" v-model="newRateTime" required>
                    </div>
                </div>
                <div class="form-row mb-40">
                    <div class="input-group mr-2">
                        <label class="required">Покупка</label>
                        <input type="text" value="" min="0" max="999999999999.99" step="0.01" class="input" placeholder="34.34" v-model="newRateData.buy" required>
                    </div>
                    <div class="input-group mr-2">
                        <label class="required">Продажа</label>
                        <input type="text" value="" min="0" max="999999999999.99" step="0.01" class="input" placeholder="36.54" v-model="newRateData.sell" required>
                    </div>
                    <div class="input-group">
                        <label>Офис</label>
                        <input type="text" value="" class="input" placeholder="A10" v-model="newRateData.office_id">
                    </div>
                </div>
                <button type="submit" class="button button-primary">Добавить</button>
            </form>

            <legend>Курс валют</legend>
            <select class="input input-md mb-1" @change="getExchangeRates()" v-model="office">
                <option v-for="office in offices" :value="office.code">
                    {{ office.name }}
                </option>
            </select>

            <table class="border px-2" v-if="exchangeRates.length">
                <thead>
                    <tr>
                        <th>Валюта</th>
                        <th>Покупка</th>
                        <th>Продажа</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in exchangeRates">
                        <td>{{ item.currency }}</td>
                        <td>{{ item.buy }}</td>
                        <td>{{ item.sell }}</td>
                    </tr>
                </tbody>
            </table>
            <div v-else>Нет данных</div>
        </div>

        <form v-else @submit.prevent="login()">
            <div class="form-row">
                <div class="input-group">
                    <label class="required">E-Mail</label>
                    <input type="email" value="" class="input input-md" placeholder="email@example.com" v-model="authData.username" required>
                </div>
            </div>
            <div class="form-row">
                <div class="input-group">
                    <label class="required">Пароль</label>
                    <input type="password" value="" class="input input-md" placeholder="********" v-model="authData.password" required>
                </div>
            </div>
            <button type="submit" class="button button-primary">Вход</button>
        </form>

        <toasts ref="toasts"></toasts>
    </div>
</template>

<script>
    // TODO: вынести форму входа в отдельный компонент
    // TODO: использовать кастомный дропдаун вместо select для визуального соответствия шаблону
    import Toasts from './Toasts';

    export default {
        components: {
            toasts: Toasts
        },

        data() {
            return {
                API_URL: '/api',
                token: '',
                exchangeRates: [],
                offices: [],
                office: '',
                authData: {
                    username: '',
                    password: '',
                },
                newRateData: {
                    currency: '',
                    buy: '',
                    sell: '',
                    office_id: '',
                    begins_at: '',
                },
                newRateDate: '',
                newRateTime: '',
            };
        },

        created: function () {
            let token = this.getCookie('access_token');

            if (token.length) {
                this.setAuthToken(token);
                this.getOffices();
            }
        },

        methods: {
            login: function() {
                let url = this.API_URL + '/login';

                axios.post(url, this.authData).then(response => {
                    this.setAuthToken(response.data.access_token);
                    this.$refs.toasts.show('Вход выполнен', 'success');
                    this.getOffices();
                }).catch(error => {
                    this.$refs.toasts.show('Ошибка аутентификации', 'danger');
                    console.error(error);
                });
            },

            setAuthToken: function(token) {
                this.token = token;
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;
                if (this.getCookie('access_token') !== this.token) {
                    this.setCookie('access_token', this.token);
                }
            },

            getOffices: function () {
                let url = this.API_URL + '/offices';

                axios.get(url).then(response => {
                    this.offices = response.data;
                    this.office = this.offices.length ? this.offices[0].code : '';
                    this.getExchangeRates();
                }).catch(error => {
                    if (error.response.status === 401) {
                        this.token = '';
                    } else {
                        this.$refs.toasts.show('Ошибка при получении данных', 'danger');
                        console.error(error);
                    }
                });
            },

            getExchangeRates: function () {
                let url = this.API_URL + '/rates';

                this.exchangeRates = [];

                let requestData = {
                    'office_id': this.office,
                    'at_date': this.getCurrentDate(),
                };

                axios.get(url, {
                    params: requestData
                }).then(response => {
                    this.exchangeRates = response.data;
                }).catch(error => {
                    if (error.response.status === 401) {
                        this.token = '';
                    } else {
                        this.$refs.toasts.show('Ошибка при получении данных', 'danger');
                        console.error(error);
                    }
                });
            },

            addExchangeRate: function() {
                let url = this.API_URL + '/rates/create';

                axios.post(url, this.newRateData).then(response => {
                    this.$refs.toasts.show('Валюта добавлена', 'success');
                    this.getExchangeRates();
                }).catch(error => {
                    if (error.response.status === 401) {
                        this.token = '';
                    } else {
                        this.$refs.toasts.show('Ошибка при добавлении', 'danger');
                        console.error(error);
                    }
                });
            },

            updateBeginsAt: function() {
                this.newRateData.begins_at = `${this.newRateDate} ${this.newRateTime}`;
            },

            getCurrentDate: function() {
                let datetime = new Date();
                let year    = datetime.getFullYear();
                let month   = ('00' + (datetime.getMonth() + 1)).slice(-2);
                let date    = ('00' + datetime.getDate()).slice(-2);
                let hours   = ('00' + datetime.getHours()).slice(-2);
                let minutes = ('00' + datetime.getMinutes()).slice(-2);

                return `${date}.${month}.${year} ${hours}:${minutes}`;
            },

            getCookie: function(name) {
                let matches = document.cookie.match(new RegExp(
                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));

                return matches ? decodeURIComponent(matches[1]) : '';
            },

            setCookie: function(name, value, options = {}) {
                if (!('path' in options)) {
                    options['path'] = '/';
                }

                if (options.expires instanceof Date) {
                    options.expires = options.expires.toUTCString();
                }

                let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

                for (let optionKey in options) {
                    updatedCookie += "; " + optionKey;
                    let optionValue = options[optionKey];
                    if (optionValue !== true) {
                        updatedCookie += "=" + optionValue;
                    }
                }

                document.cookie = updatedCookie;
            },
        },

        watch : {
            newRateDate: function() {
                this.updateBeginsAt();
            },
            newRateTime: function() {
                this.updateBeginsAt();
            },
        }
    }
</script>