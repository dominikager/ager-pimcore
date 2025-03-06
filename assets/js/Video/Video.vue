<template>
    <div class="sujet-video">
        <LazyVideoAsGIF :sources="[
              'https://res.cloudinary.com/ager-gesmbh/video/upload/ac_none,c_scale,w_1600/v1574534294/hero_ager_color_jmgtul.mp4',
              'https://res.cloudinary.com/ager-gesmbh/video/upload/ac_none,c_scale,w_1600/v1574534294/hero_ager_color_jmgtul.webm'
            ]" :poster="poster">
        </LazyVideoAsGIF>
    </div>

</template>

<script>
    export default {
      name: 'VueVideo',
      props: {
        poster: {
          type: String,
          default: null
        }
      }
    }
</script>
