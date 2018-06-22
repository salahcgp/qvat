function initialState() {
    return {
        item: {
            id: null,
            company: null,
            invoice_no: null,
            invoice_date: null,
            customer: null,
            quantity: 0,
            price: 0,
            vat: 0,
            discount: 0,
            amount_before_vat: 0,
            transaction_total: 0,
            created_by: null,
            created_by_team: null,
        },
        createcompaniesAll: [],
        customersAll: [],
        usersAll: [],
        teamsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    createcompaniesAll: state => state.createcompaniesAll,
    customersAll: state => state.customersAll,
    usersAll: state => state.usersAll,
    teamsAll: state => state.teamsAll,
    
}

const actions = {
    storeData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.company)) {
                params.set('company_id', '')
            } else {
                params.set('company_id', state.item.company.id)
            }
            if (_.isEmpty(state.item.customer)) {
                params.set('customer_id', '')
            } else {
                params.set('customer_id', state.item.customer.id)
            }
            if (_.isEmpty(state.item.created_by)) {
                params.set('created_by_id', '')
            } else {
                params.set('created_by_id', state.item.created_by.id)
            }
            if (_.isEmpty(state.item.created_by_team)) {
                params.set('created_by_team_id', '')
            } else {
                params.set('created_by_team_id', state.item.created_by_team.id)
            }

            axios.post('/api/v1/sales-invoices', params)
                .then(response => {
                    commit('resetState')
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    updateData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();
            params.set('_method', 'PUT')

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.company)) {
                params.set('company_id', '')
            } else {
                params.set('company_id', state.item.company.id)
            }
            if (_.isEmpty(state.item.customer)) {
                params.set('customer_id', '')
            } else {
                params.set('customer_id', state.item.customer.id)
            }
            if (_.isEmpty(state.item.created_by)) {
                params.set('created_by_id', '')
            } else {
                params.set('created_by_id', state.item.created_by.id)
            }
            if (_.isEmpty(state.item.created_by_team)) {
                params.set('created_by_team_id', '')
            } else {
                params.set('created_by_team_id', state.item.created_by_team.id)
            }

            axios.post('/api/v1/sales-invoices/' + state.item.id, params)
                .then(response => {
                    commit('setItem', response.data.data)
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/sales-invoices/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchCreatecompaniesAll')
    dispatch('fetchCustomersAll')
    dispatch('fetchUsersAll')
    dispatch('fetchTeamsAll')
    },
    fetchCreatecompaniesAll({ commit }) {
        axios.get('/api/v1/create-companies')
            .then(response => {
                commit('setCreatecompaniesAll', response.data.data)
            })
    },
    fetchCustomersAll({ commit }) {
        axios.get('/api/v1/customers')
            .then(response => {
                commit('setCustomersAll', response.data.data)
            })
    },
    fetchUsersAll({ commit }) {
        axios.get('/api/v1/users')
            .then(response => {
                commit('setUsersAll', response.data.data)
            })
    },
    fetchTeamsAll({ commit }) {
        axios.get('/api/v1/teams')
            .then(response => {
                commit('setTeamsAll', response.data.data)
            })
    },
    setCompany({ commit }, value) {
        commit('setCompany', value)
    },
    setInvoice_no({ commit }, value) {
        commit('setInvoice_no', value)
    },
    setInvoice_date({ commit }, value) {
        commit('setInvoice_date', value)
    },
    setCustomer({ commit }, value) {
        commit('setCustomer', value)
    },
    setQuantity({ commit }, value) {
        commit('setQuantity', value)
    },
    setPrice({ commit }, value) {
        commit('setPrice', value)
    },
    setVat({ commit }, value) {
        commit('setVat', value)
    },
    setDiscount({ commit }, value) {
        commit('setDiscount', value)
    },
    setAmount_before_vat({ commit }, value) {
        commit('setAmount_before_vat', value)
    },
    setTransaction_total({ commit }, value) {
        commit('setTransaction_total', value)
    },
    setCreated_by({ commit }, value) {
        commit('setCreated_by', value)
    },
    setCreated_by_team({ commit }, value) {
        commit('setCreated_by_team', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setCompany(state, value) {
        state.item.company = value
    },
    setInvoice_no(state, value) {
        state.item.invoice_no = value
    },
    setInvoice_date(state, value) {
        state.item.invoice_date = value
    },
    setCustomer(state, value) {
        state.item.customer = value
    },
    setQuantity(state, value) {
        state.item.quantity = value
        state.item.vat = ((state.item.quantity * state.item.price)-state.item.discount)  * 0.05
        state.item.amount_before_vat = ((state.item.quantity * state.item.price)-state.item.discount)
        state.item.transaction_total = state.item.amount_before_vat + state.item.vat
    },
    setPrice(state, value) {
        state.item.price = value
        state.item.vat = ((state.item.quantity * state.item.price)-state.item.discount)  * 0.05
        state.item.amount_before_vat = ((state.item.quantity * state.item.price)-state.item.discount)
        state.item.transaction_total = state.item.amount_before_vat + state.item.vat
    },
    setVat(state, value) {
        state.item.vat = value
    },
    setDiscount(state, value) {
        state.item.discount = value
        state.item.vat = ((state.item.quantity * state.item.price)-state.item.discount)  * 0.05
        state.item.amount_before_vat = ((state.item.quantity * state.item.price)-state.item.discount)
        state.item.transaction_total = state.item.amount_before_vat + state.item.vat
    },
    setAmount_before_vat(state, value) {
        state.item.amount_before_vat = value
    },
    setTransaction_total(state, value) {
        state.item.transaction_total = value
    },
    setCreated_by(state, value) {
        state.item.created_by = value
    },
    setCreated_by_team(state, value) {
        state.item.created_by_team = value
    },
    setCreatecompaniesAll(state, value) {
        state.createcompaniesAll = value
    },
    setCustomersAll(state, value) {
        state.customersAll = value
    },
    setUsersAll(state, value) {
        state.usersAll = value
    },
    setTeamsAll(state, value) {
        state.teamsAll = value
    },
    
    setLoading(state, loading) {
        state.loading = loading
    },
    resetState(state) {
        state = Object.assign(state, initialState())
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
