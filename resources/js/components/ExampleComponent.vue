<template>
    <div class="container">
        <div class="row justify-content-center mb-3" ref="imageUpload">
            <div class="col-12 bg-dark text-white rounded my-2 py-3 text-center">
                <h2 style="color:white">DROP IMAGE(S) HERE</h2>
            </div>
        </div>
    </div>
</template>

<script>
    import Dropzone from 'dropzone';

    export default {
        data: function() {
            return {
                dropzone: null
            }
        },

        mounted() {
            this.dropzone = new Dropzone(this.$refs.imageUpload, {
                url: '/api/homeImages',
            });
        }
    }
</script>