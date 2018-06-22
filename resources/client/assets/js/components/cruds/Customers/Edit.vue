<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Customers</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="customer_name">Customer name *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="customer_name"
                                            placeholder="Enter Customer name *"
                                            :value="item.customer_name"
                                            @input="updateCustomer_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="billing_address">Billing address</label>
                                    <textarea
                                            rows="3"
                                            class="form-control"
                                            name="billing_address"
                                            placeholder="Enter Billing address"
                                            :value="item.billing_address"
                                            @input="updateBilling_address"
                                            >
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="shipping_address">Shipping address</label>
                                    <textarea
                                            rows="3"
                                            class="form-control"
                                            name="shipping_address"
                                            placeholder="Enter Shipping address"
                                            :value="item.shipping_address"
                                            @input="updateShipping_address"
                                            >
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="mobile"
                                            placeholder="Enter Mobile"
                                            :value="item.mobile"
                                            @input="updateMobile"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="phone"
                                            placeholder="Enter Phone"
                                            :value="item.phone"
                                            @input="updatePhone"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            placeholder="Enter Email"
                                            :value="item.email"
                                            @input="updateEmail"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="trn">TRN</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="trn"
                                            placeholder="Enter TRN"
                                            :value="item.trn"
                                            @input="updateTrn"
                                            >
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    computed: {
        ...mapGetters('CustomersSingle', ['item', 'loading']),
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('CustomersSingle', ['fetchData', 'updateData', 'resetState', 'setCustomer_name', 'setBilling_address', 'setShipping_address', 'setMobile', 'setPhone', 'setEmail', 'setTrn']),
        updateCustomer_name(e) {
            this.setCustomer_name(e.target.value)
        },
        updateBilling_address(e) {
            this.setBilling_address(e.target.value)
        },
        updateShipping_address(e) {
            this.setShipping_address(e.target.value)
        },
        updateMobile(e) {
            this.setMobile(e.target.value)
        },
        updatePhone(e) {
            this.setPhone(e.target.value)
        },
        updateEmail(e) {
            this.setEmail(e.target.value)
        },
        updateTrn(e) {
            this.setTrn(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'customers.index' })
                    this.$eventHub.$emit('update-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
