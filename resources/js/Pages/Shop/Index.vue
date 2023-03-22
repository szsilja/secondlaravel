<script setup>
import Layout from '@/Layouts/Layout.vue'
import ProductCard from '@/Components/ProductCard.vue'
const props = defineProps({
    products: {
        type: Object,
        default: null,
        }
})
console.log(props.products)
</script>
<template>
<Layout>
        <div class="mt-16 max-w-screen-lg mx-auto px-6">
            <h1 class="tracking-wider text-xl">E-pood</h1>
            <div class="grid grid-cols-3 gap-4 mt-12">
                <ProductCard v-for="product in products.data" :key="product" :product="product"/>
            </div>
        </div>
    </Layout>
</template>