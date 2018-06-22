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
                                <h3 class="box-title">Create</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="first_name">First name *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="first_name"
                                            placeholder="Enter First name *"
                                            :value="item.first_name"
                                            @input="updateFirst_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last name</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="last_name"
                                            placeholder="Enter Last name"
                                            :value="item.last_name"
                                            @input="updateLast_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="crm_status">Status *</label>
                                    <v-select
                                            name="crm_status"
                                            label="title"
                                            @input="updateCrm_status"
                                            :value="item.crm_status"
                                            :options="crmstatusesAll"
                                            />
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
                                    <label for="address">Address</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="address"
                                            placeholder="Enter Address"
                                            :value="item.address"
                                            @input="updateAddress"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="skype">Skype</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="skype"
                                            placeholder="Enter Skype"
                                            :value="item.skype"
                                            @input="updateSkype"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="website"
                                            placeholder="Enter Website"
                                            :value="item.website"
                                            @input="updateWebsite"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea
                                            rows="3"
                                            class="form-control"
                                            name="description"
                                            placeholder="Enter Description"
                                            :value="item.description"
                                            @input="updateDescription"
                                            >
                                    </textarea>
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
        ...mapGetters('CrmCustomersSingle', ['item', 'loading', 'crmstatusesAll'])
    },
    created() {
        this.fetchCrmstatusesAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('CrmCustomersSingle', ['storeData', 'resetState', 'setFirst_name', 'setLast_name', 'setCrm_status', 'setEmail', 'setPhone', 'setAddress', 'setSkype', 'setWebsite', 'setDescription', 'fetchCrmstatusesAll']),
        updateFirst_name(e) {
            this.setFirst_name(e.target.value)
        },
        updateLast_name(e) {
            this.setLast_name(e.target.value)
        },
        updateCrm_status(value) {
            this.setCrm_status(value)
        },
        updateEmail(e) {
            this.setEmail(e.target.value)
        },
        updatePhone(e) {
            this.setPhone(e.target.value)
        },
        updateAddress(e) {
            this.setAddress(e.target.value)
        },
        updateSkype(e) {
            this.setSkype(e.target.value)
        },
        updateWebsite(e) {
            this.setWebsite(e.target.value)
        },
        updateDescription(e) {
            this.setDescription(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'crm_customers.index' })
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
