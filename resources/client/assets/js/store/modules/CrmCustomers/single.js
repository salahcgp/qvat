function initialState() {
    return {
        item: {
            id: null,
            first_name: null,
            last_name: null,
            crm_status: null,
            email: null,
            phone: null,
            address: null,
            skype: null,
            website: null,
            description: null,
            created_by: null,
            created_by_team: null,
        },
        crmstatusesAll: [],
        usersAll: [],
        teamsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    crmstatusesAll: state => state.crmstatusesAll,
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

            if (_.isEmpty(state.item.crm_status)) {
                params.set('crm_status_id', '')
            } else {
                params.set('crm_status_id', state.item.crm_status.id)
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

            axios.post('/api/v1/crm-customers', params)
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

            if (_.isEmpty(state.item.crm_status)) {
                params.set('crm_status_id', '')
            } else {
                params.set('crm_status_id', state.item.crm_status.id)
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

            axios.post('/api/v1/crm-customers/' + state.item.id, params)
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
        axios.get('/api/v1/crm-customers/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchCrmstatusesAll')
    dispatch('fetchUsersAll')
    dispatch('fetchTeamsAll')
    },
    fetchCrmstatusesAll({ commit }) {
        axios.get('/api/v1/crm-statuses')
            .then(response => {
                commit('setCrmstatusesAll', response.data.data)
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
    setFirst_name({ commit }, value) {
        commit('setFirst_name', value)
    },
    setLast_name({ commit }, value) {
        commit('setLast_name', value)
    },
    setCrm_status({ commit }, value) {
        commit('setCrm_status', value)
    },
    setEmail({ commit }, value) {
        commit('setEmail', value)
    },
    setPhone({ commit }, value) {
        commit('setPhone', value)
    },
    setAddress({ commit }, value) {
        commit('setAddress', value)
    },
    setSkype({ commit }, value) {
        commit('setSkype', value)
    },
    setWebsite({ commit }, value) {
        commit('setWebsite', value)
    },
    setDescription({ commit }, value) {
        commit('setDescription', value)
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
    setFirst_name(state, value) {
        state.item.first_name = value
    },
    setLast_name(state, value) {
        state.item.last_name = value
    },
    setCrm_status(state, value) {
        state.item.crm_status = value
    },
    setEmail(state, value) {
        state.item.email = value
    },
    setPhone(state, value) {
        state.item.phone = value
    },
    setAddress(state, value) {
        state.item.address = value
    },
    setSkype(state, value) {
        state.item.skype = value
    },
    setWebsite(state, value) {
        state.item.website = value
    },
    setDescription(state, value) {
        state.item.description = value
    },
    setCreated_by(state, value) {
        state.item.created_by = value
    },
    setCreated_by_team(state, value) {
        state.item.created_by_team = value
    },
    setCrmstatusesAll(state, value) {
        state.crmstatusesAll = value
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
