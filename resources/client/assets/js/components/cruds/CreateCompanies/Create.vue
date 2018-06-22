<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Create company</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Create</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="company_name">Company name *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="company_name"
                                            placeholder="Enter Company name *"
                                            :value="item.company_name"
                                            @input="updateCompany_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="billing_address">Billing address *</label>
                                    <textarea
                                            rows="3"
                                            class="form-control"
                                            name="billing_address"
                                            placeholder="Enter Billing address *"
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
                                    <label for="mobile">Mobile *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="mobile"
                                            placeholder="Enter Mobile *"
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
                                    <label for="trn">TRN *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="trn"
                                            placeholder="Enter TRN *"
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
        ...mapGetters('CreateCompaniesSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('CreateCompaniesSingle', ['storeData', 'resetState', 'setCompany_name', 'setBilling_address', 'setShipping_address', 'setMobile', 'setPhone', 'setEmail', 'setTrn']),
        updateCompany_name(e) {
            this.setCompany_name(e.target.value)
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
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'create_companies.index' })
                    this.$eventHub.$emit('create-success')
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
