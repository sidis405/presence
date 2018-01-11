<template>
    <button type="submit" class="w-32 px-6 py-6 text-white rounded float-right uppercase" :class="inClass" v-text="inType"></button>
    </div>
</template>

<script>


    export default {
        props: ['inType', 'inClass']
    }
</script>
