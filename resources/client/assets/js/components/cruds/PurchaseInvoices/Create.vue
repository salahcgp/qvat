<template>
<section class="content-wrapper" style="min-height: 960px;">
    <section class="content-header">
        <h1>Purchase invoices</h1>
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
                            <div class="row">
                                <div class="col col-xs-6">
                                </div>
                                
                                <div class="col col-xs-6">
                                    <div class="form-group">
                                        <label for="company">Company *</label>
                                        <v-select
                                        name="company"
                                        label="company_name"
                                        @input="updateCompany"
                                        :value="item.company"
                                        :options="createcompaniesAll"
                                        />
                                    </div>
                                </div>
                                <br><br><br><br><br>
                            </div>
                            <div class="row">
                                <div class="col col-xs-4">
                                    <div class="form-group">
                                        <label for="invoice_no">Invoice number *</label>
                                        <input
                                        type="number"
                                        class="form-control"
                                        name="invoice_no"
                                        placeholder="Enter Invoice number *"
                                        :value="item.invoice_no"
                                        @input="updateInvoice_no"
                                        >
                                    </div>
                                </div>
                                <div class="col  col-xs-4">
                                    <div class="form-group">
                                        <label for="invoice_date">Invoice date *</label>
                                        <date-picker
                                        :value="item.invoice_date"
                                        :config="$root.dpconfigDate"
                                        name="invoice_date"
                                        placeholder="Enter Invoice date *"
                                        @dp-change="updateInvoice_date"
                                        >
                                        </date-picker>
                                    </div>
                                </div>
                                <div class="col  col-xs-4">
                                    <div class="form-group">
                                        <label for="customer">Supplier *</label>
                                        <v-select
                                        name="customer"
                                        label="supplier_name"
                                        @input="updateCustomer"
                                        :value="item.customer"
                                        :options="suppliersAll"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-xs-4"></div>
                                <div class="col col-xs-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="quantity">Quantity *</label>
                                        <div class="col-sm-8"><input
                                            type="number"
                                            class="form-control"
                                            name="quantity"
                                            placeholder="Enter Quantity *"
                                            :value="item.quantity"
                                            @input="updateQuantity"
                                            >
                                        </div></div>
                                    </div>
                                    <div class="col col-xs-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="price">Price *</label>
                                            <div class="col-sm-8"><input
                                                type="text"
                                                class="form-control"
                                                name="price"
                                                placeholder="Enter Price *"
                                                :value="item.price"
                                                @input="updatePrice"
                                                >
                                            </div></div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col col-xs-8"></div>
                                        <div class="col-xs-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4" for="vat">VAT *</label>
                                                <div class="col-sm-8"> <input
                                                    type="text"
                                                    class="form-control"
                                                    name="vat"
                                                    placeholder="Enter VAT *"
                                                    :value="item.vat"
                                                    @input="updateVat"
                                                    >
                                                </div></div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col col-xs-8"></div>
                                            <div class="col-xs-4">
                                                <div class="form-group row">
                                                    <label class="col-sm-4" for="discount">Discount</label>
                                                    <div class="col-sm-8"><input
                                                        type="text"
                                                        class="form-control"
                                                        name="discount"
                                                        placeholder="Enter Discount"
                                                        :value="item.discount"
                                                        @input="updateDiscount"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col col-xs-8"></div>
                                            <div class="col-xs-4">
                                                <div class="form-group row">
                                                    <label class="col-sm-4" for="amount_before_vat">Amount before vat *</label><div class="col-sm-8">
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    name="amount_before_vat"
                                                    placeholder="Enter Amount before vat *"
                                                    :value="item.amount_before_vat"
                                                    @input="updateAmount_before_vat"
                                                    >
                                                </div> </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col col-xs-8"></div>
                                            <div class="col-xs-4">
                                                <div class="form-group row">
                                                    <label class="col-sm-4" for="transaction_total">Transaction total *</label><div class="col-sm-8">
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    name="transaction_total"
                                                    placeholder="Enter Transaction total *"
                                                    :value="item.transaction_total"
                                                    @input="updateTransaction_total"
                                                    >
                                                </div></div></div>
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
                ...mapGetters('PurchaseInvoicesSingle', ['item', 'loading', 'createcompaniesAll', 'suppliersAll'])
                },
                created() {
                this.fetchCreatecompaniesAll(),
                this.fetchSuppliersAll()
                },
                destroyed() {
                this.resetState()
                },
                methods: {
                ...mapActions('PurchaseInvoicesSingle', ['storeData', 'resetState', 'setCompany', 'setInvoice_no', 'setInvoice_date', 'setCustomer', 'setQuantity', 'setPrice', 'setVat', 'setDiscount', 'setAmount_before_vat', 'setTransaction_total', 'fetchCreatecompaniesAll', 'fetchSuppliersAll']),
                updateCompany(value) {
                this.setCompany(value)
                },
                updateInvoice_no(e) {
                this.setInvoice_no(e.target.value)
                },
                updateInvoice_date(e) {
                this.setInvoice_date(e.target.value)
                },
                updateCustomer(value) {
                this.setCustomer(value)
                },
                updateQuantity(e) {
                this.setQuantity(e.target.value)
                },
                updatePrice(e) {
                this.setPrice(e.target.value)
                },
                updateVat(e) {
                this.setVat(e.target.value)
                },
                updateDiscount(e) {
                this.setDiscount(e.target.value)
                },
                updateAmount_before_vat(e) {
                this.setAmount_before_vat(e.target.value)
                },
                updateTransaction_total(e) {
                this.setTransaction_total(e.target.value)
                },
                submitForm() {
                this.storeData()
                .then(() => {
                this.$router.push({ name: 'purchase_invoices.index' })
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