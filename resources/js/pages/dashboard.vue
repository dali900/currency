<template>
    <div class="currency-dashboard">
        <Card>
            <template #title>
                Currency dashboard
            </template>
            <template #content>
                <div v-if="currencies.length">
                    <div>Convert currency</div>
                    <div class="field">
                        <Dropdown v-model="selectCurrencyFrom" :options="dropdown_options" optionLabel="symbol" optionValue="symbol" placeholder="From" />
                    </div>
                    <div class="field">
                        <Dropdown v-model="selectCurrencyTo" :options="dropdown_options" optionLabel="symbol" optionValue="symbol" placeholder="To" />
                    </div>
                    <div class="field">
                        <InputText type="text" v-model="amount" placeholder="Amount"/>
                    </div>
                    <div class="field">
                        <div>Result</div>
                        <div>
                            <b>
                                {{result}}
                            </b>
                        </div>
                    </div>
                </div>
                <div v-else>
                    Fetching currencies, please waite... <ProgressSpinner style="width:50px;height:50px" />
                </div>
            </template>
        </Card>
        
    </div>
</template>

<script>

export default {
    components: {},
    computed: {
        result(){
            let currency_to = this.currencies.find((el, index) => {
                if(el.symbol == this.selectCurrencyTo)
                    return true;
            });
            let currency_from = this.currencies.find((el, index) => {
                if(el.symbol == this.selectCurrencyFrom)
                    return true;
            });
            if(this.selectCurrencyFrom && this.selectCurrencyTo)
            {
                if(this.selectCurrencyFrom === this.base)
                {
                    return this.amount*currency_to.value;

                }
                else
                {
                    
                    let base = this.amount/currency_from.value;
                    return base*currency_to.value
                }
            }
            return "";
            console.log(currency);
            
        }
    },
    data(){
        return {
            currencies: [],
            base: null,
            dropdown_options: [],
            selectCurrencyFrom: null,
            selectCurrencyTo: null,
            amount: null
        }
    },
    mounted(){
        this.getCurrecies();
    },
    methods: {
        getCurrecies(){
            axios.get('/api/getCurrecies')
            .then((response) => {
                console.log(response);
                this.currencies = response.data.data.currencies;
                this.base = response.data.data.base;
                this.dropdown_options.push({symbol: response.data.data.base, value: 1});
                for (const key in this.currencies) {
                    const element = this.currencies[key];
                    this.dropdown_options.push({symbol: element.symbol, value: element.value});
                }

            })
            .catch((error) => {
                console.log(error.response.data.message);
            });
        },
        
    }
}
</script>

<style>
.currency-dashboard .field{
    margin: 5px;
}
</style>