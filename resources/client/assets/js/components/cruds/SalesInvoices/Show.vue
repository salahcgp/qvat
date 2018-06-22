<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Sales invoices</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">View</h3>
                        </div>

                        <div class="box-body">
                            <back-buttton></back-buttton>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th>#</th>
                                            <td>{{ item.id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company</th>
                                            <td>
                                                <span class="label label-info" v-if="item.company !== null">
                                                    {{ item.company.company_name }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Invoice number</th>
                                            <td>{{ item.invoice_no }}</td>
                                            </tr>
                                        <tr>
                                            <th>Invoice date</th>
                                            <td>{{ item.invoice_date }}</td>
                                            </tr>
                                        <tr>
                                            <th>Customer</th>
                                            <td>
                                                <span class="label label-info" v-if="item.customer !== null">
                                                    {{ item.customer.customer_name }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Quantity</th>
                                            <td>{{ item.quantity }}</td>
                                            </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>{{ item.price }}</td>
                                            </tr>
                                        <tr>
                                            <th>VAT</th>
                                            <td>{{ item.vat }}</td>
                                            </tr>
                                        <tr>
                                            <th>Discount</th>
                                            <td>{{ item.discount }}</td>
                                            </tr>
                                        <tr>
                                            <th>Amount before vat</th>
                                            <td>{{ item.amount_before_vat }}</td>
                                            </tr>
                                        <tr>
                                            <th>Transaction total</th>
                                            <td>{{ item.transaction_total }}</td>
                                            </tr>
                                        <tr>
                                            <th>Created by</th>
                                            <td>
                                                <span class="label label-info" v-if="item.created_by !== null">
                                                    {{ item.created_by.name }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created by Team</th>
                                            <td>
                                                <span class="label label-info" v-if="item.created_by_team !== null">
                                                    {{ item.created_by_team.name }}
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('SalesInvoicesSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('SalesInvoicesSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
