<script setup>
const { spare } = defineProps(["spare"]);
</script>

<template>
    <div class="featured_item">
        <div class="item_img">
            <img src="./../../assets/home_image.png" alt="" />
        </div>
        <div class="item_content">
            <h4 class="item_title">Titre</h4>
            <p class="item_description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
                consectetur a lacus eget luctus. Integer placerat eros a quam
                luctus vulputate. Vivamus aliquam diam ut est fringilla, quis
                bibendum nulla tempor.
            </p>
            <button>Plus</button>
        </div>
    </div>
</template>
