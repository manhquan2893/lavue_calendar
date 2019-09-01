<template>
    <div class="week">
        <!-- listen to event user click from day component -->
        <Day v-for="(day,index) in list_days" 
        :key="index" 
        :day="day"
        :events="list_events"
        @userclicked="setActiveDay">
        </Day>
    </div>
</template>

<script>
import Day from './DayComponent.vue';
import moment from 'moment'
    export default {
        data() {
            return {
                list_days:[]
                , list_events:[]
            }
        },
        components:{
            Day
        },
        created () {
            this.getListDay();
        },
        methods: {
            getListDay() {
                let self=this;
                axios.get('event')
                .then(function(response){
                    self.list_days=response.data.days;
                    self.list_events=response.data.events;
                });
            },
            setActiveDay(day){
                this.$emit('userclicked',day)
            }
        },
        mounted () {
            let self=this
            this.$root.$on('usersubmited',function(event,day_id){
                self.list_events.push({
                    created_at:moment().format('YYYY-MM-DD HH:mm:ss'),
                    day_id:day_id,
                    event_content:event,
                    id:self.list_events.length+1,
                    updated_at:moment().format('YYYY-MM-DD HH:mm:ss')
                })
            })
        }
    }
</script>

<style >
    .week{
        display:flex;
        max-width: 900px;
        flex-wrap: wrap;
       
    }
</style>