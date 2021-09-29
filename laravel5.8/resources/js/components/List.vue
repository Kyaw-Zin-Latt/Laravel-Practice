<template>

    <ul class="list-group">
        <li class="list-group-item" v-for="(arr,index) in arrs" :key="index">{{ arr }}</li>
    </ul>

</template>

<script>
    export default {
        name: "List",
        data() {
            return {
                arrs : ["apple","orange","banana"],
            }
        },
    }
</script>

<style scoped>

</style>
