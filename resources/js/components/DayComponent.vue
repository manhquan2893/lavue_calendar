<template>
    <div class="day-box">
        <h3>{{day.day}}</h3>
        <div class="day" v-on:click="userclicked">
            <Event v-for="(event,index) in events" 
                :key="index"
                v-show="event.day_id==day.id"
                :event="event"
                ></Event>
        </div>
    </div>
</template>

<script>
    import Event from './EventComponent.vue';
    export default {
        components:{
            Event
        },
        props:['day','events'],
        methods: {
            userclicked() {
                this.$emit('userclicked',this.day)
            }
        }
    }
</script>

<style>
    .day{
        width: 200px;
        min-height:250px;
        box-sizing: border-box;
        border:1px solid #dfc9c9;
        margin-bottom: 25px;
        border-radius: 8px;
        background:rgb(11, 11, 34);
        padding:20px;
    }
    h3{
        text-align: center;
    }
    
</style>