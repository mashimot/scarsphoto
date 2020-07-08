<template>
<div>
    <ul style="color: black !important">
        <li v-for="social_media in social_medias" class="social-icon">
            <a class="ntips" :title="social_media.name" :href="social_media.url" target="_blank">
                <i :class="social_media.icon" aria-hidden="true"></i>
            </a>
        </li>
    </ul>
</div>
</template>

<script>
    export default {
        data() {
            return {
                social_medias: [{
                    name: 'Facebook',
                    icon: 'fa fa-facebook',
                    url: 'https://www.facebook.com/Scarsphoto'
                },{
                    name: '500px',
                    icon: 'fa fa-500px',
                    url: 'https://500px.com/fabiohashimoto777'
                },{
                    name: 'Instagram',
                    icon: 'fa fa-instagram',
                    url: 'https://www.instagram.com/semtarjas_oficial'
                }]
            }
        },
        methods: {
        },
        created(){
        },
    }
</script>