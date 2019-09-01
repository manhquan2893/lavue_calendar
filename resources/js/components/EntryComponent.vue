<template>
    <div class="entry">
        <p>Entry for <strong>{{currentDay.day}}</strong></p>
        <input type="text" v-model="entry">
        <button id="postEntry" v-on:click="usersubmited">Submit</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                entry: ''
            }
        },
        props:['currentDay'],
        
        methods: {
            usersubmited() {
                //display new event on frontend 
                //this.$root.$emit('usersubmited',this.entry,this.day)
                //request to server for saving data
                if(!this.entry){
                    alert('enter an event!')
                    throw new Error('enter an event!')
                }
                if(!this.currentDay){
                    alert('click on to choose a day!')
                    throw new Error('click on to choose a day!')
                }
                let self=this;
                axios.post('event',{
                    event_content:self.entry,
                    day_id:self.currentDay.id
                    })
                .then(function(response){
                    console.log(response);
                    self.$root.$emit('usersubmited',self.entry,self.currentDay.id)
                });
            }
        },
    }
</script>

<style >
    .entry{
        border: darkseagreen 1px solid;
        margin-left: 30px;
        padding: 10px;
        width: 181px;
        height: 112px;
        margin-top:80px;
    }
    input{
        color:rgb(149, 145, 145);
        margin-bottom: 15px;
    }
    button{
        background:rgb(112, 160, 112);
        border:none;
        cursor: pointer;
        padding: 5px 8px;
    }
</style>