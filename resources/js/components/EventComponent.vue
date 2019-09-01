<template>
    <div class="event">
        {{event.event_content}}
    </div>
</template>

<script>
    export default {
        props:['event']
    }
</script>

<style >
    .event{
        background:darkorange;
        padding:10px;
        border-radius: 8px;
        margin-bottom: 15px;
    }
</style>