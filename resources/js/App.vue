<template>
    <div class="app">
        <Week @userclicked="setActiveDay"></Week>
        <Entry :currentDay="currentDay"></Entry>
    </div>
</template>

<script>
import Week from './components/WeekComponent.vue'
import Entry from './components/EntryComponent.vue';
    export default {
        components:{
            Week,
            Entry
        },
        data() {
            return {
                currentDay: ''
            }
        },
        methods: {
            setActiveDay(day) {
                this.currentDay=day
            }
        },
    }
</script>

<style >
    .app{
        display: grid;
        grid-template-columns: 8fr 3fr;
    }
</style>