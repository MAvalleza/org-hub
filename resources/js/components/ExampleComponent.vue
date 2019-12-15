<template lang="pug">
    div
        a(class="btn btn-primary" @click="text = 'Hey'").text-white Button

        span {{ text }}
        
        sub-component
</template>

<script>
import SubComponent from './SubComponent';
import { VBtn } from 'vuetify';
export default {
    components: {
        VBtn,
        SubComponent
    },
    mounted() {
        console.log('Component mounted.')
    },
    data () {
        return {
            text: 'No'
        };
    }
}
</script>
