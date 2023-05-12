<script setup>
const props = defineProps({
    cart: {
        type: Object,
        default: null,
    }, 
});

console.log(props.cart)
</script>
<template>
    <div>
      <header>
        <p>{{Object.entries(cart).length}} in cart</p>
        <button v-on:click="navigateTo('/shop/cart')
        ">View Cart</button>
      </header>
        <h2>Ostukorv</h2>
  </div>
</template>

<style scoped>
.products {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 1rem;
}

header {
    font-weight: 600;
    margin-bottom: 1rem;
    background-color: #f8f8f8;
    box-shadow: 2px 2px 5px #999;
    text-align: right;
    font-size: 20px;
    padding-top: 20px;
}
</style>
