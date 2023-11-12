<script setup>
import Header from "../components/Header.vue";
import FeaturedItem from "../components/FeaturedItem.vue";
import { useRouter } from "vue-router";

const router = useRouter()

</script>

<template>
    <div class="">
        <Header />
        <section class="presentation">
            <div class="presentation_text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Vivamus consectetur a lacus eget luctus. Integer placerat
                    eros a quam luctus vulputate. Vivamus aliquam diam ut est
                    fringilla, quis bibendum nulla tempor. Donec porta eros
                    urna, a tristique augue sodales vel. Praesent vel elit vitae
                    diam lobortis vulputate. Fusce eu elementum risus. Nam quis
                    pretium elit. Cras sollicitudin, nisl non tempus tristique,
                    mauris purus congue orci, non euismod neque risus nec nibh.
                    Curabitur commodo nunc dolor, non iaculis tortor dignissim
                    quis. Pellentesque congue risus non rutrum consequat.
                    Integer vehicula lectus aliquam ex auctor, in commodo ipsum
                    eleifend. Ut fermentum fringilla orci pulvinar sodales.
                </p>
            </div>
            <div class="presentation_img">
                <div class="image_section">
                    <img class="" src="./../../assets/home_image.png" alt="" />
                </div>
            </div>
        </section>

        <section class="featured_section">
            <h2>Un aperçu de nos pièces</h2>
            <div class="featured_list">
                <FeaturedItem />
                <FeaturedItem />
                <FeaturedItem />
                <FeaturedItem />
            </div>
            <button @click="router.push('/all-spares')" class="show_all btn btn-primary btn-no-animation">Tout voir</button>
        </section>
    </div>
</template>
