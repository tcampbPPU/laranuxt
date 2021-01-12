export const state = () => ({
  authenticated: false,
})

export const mutations = {
  setAuth (state) {
    state.authenticated = true
  },
}
