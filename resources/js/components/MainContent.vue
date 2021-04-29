<template>
    <div class="s003">
        <div v-if="ad !== null" class="floating-ad">
            <h1>Advertisement: </h1>
            <img :src="'/storage/' + ad.image" alt="Ad">
            <h4>{{ ad.name }}</h4>
            <p>{{ ad.description }}</p>
        </div>
        <form @submit="formSubmitted">
            <div class="inner-form">
                <div class="input-field second-wrap">
                    <input id="search" type="text" v-model="searchField" placeholder="Enter Keywords?" />
                </div>
                <div class="input-field third-wrap">
                    <button
                        class="btn-search" type="button"
                        @click="formSubmitted"
                    >
                        <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        <button
            class="floating-button"
            @click="toggleSidebar"
        >
            Toggle Detailed Information
        </button>
        <div
            class="prev-searches"
            :class="{'active': showPrevSearch}"
        >
            <h1>Previous Search Queries</h1>
            <h2
                class="reset-button"
                @click="reset"
            >
                <span>Reset</span>
            </h2>
            <div class="text-container">
                <p v-for="search in searchList">
                    {{ search }}
                </p>
            </div>
            <h1>Resultant Keywords</h1>
            <div class="text-container">
                <p v-for="result in extractions">
                    {{ JSON.parse(result.tags) }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'MainContent',
        data() {
            return {
                searchField: '',
                searchList: [],
                showPrevSearch: false,
                extractions: [],
                ad: null,
            }
        },
        methods: {
            formSubmitted(e) {
                e.preventDefault()
                this.searchList.push(this.searchField)
                axios.post('/save-user-tags', {
                    text: this.searchField
                }).then((response)=>{
                    this.searchField = ''
                    this.extractions = response.data.keywords
                    this.getAd();
                })
            },
            toggleSidebar() {
                this.showPrevSearch = !this.showPrevSearch
            },
            getAd() {
                axios.get('/get-preferred-ad')
                    .then((response)=>{
                        this.ad = response.data.ad
                        this.extractions = response.data.keywords
                    }
                )
            },
            reset() {
                this.searchList = []
                this.extractions = []
                axios.get('/reset-keywords')
                    .then(()=>{
                        this.extractions = []
                    }
                )
            }
        },
        mounted() {
            if (localStorage.getItem('searchList'))  {
              this.searchList = JSON.parse(localStorage.getItem('searchList'))
            }
            this.getAd()
        },
        watch: {
            searchList: {
                // This will let Vue know to look inside the array
                deep: true,

                // We have to move our method to a handler field
                handler() {
                    localStorage.setItem('searchList', JSON.stringify(this.searchList))
                }
            },
        }
    }
</script>
