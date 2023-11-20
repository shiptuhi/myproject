// import {createStore} from 'vuex';

// export default createStore({
//     state: {
//       user: null,
//     },
//     mutations: {
//       setUser(state, user) {
//         state.user = user;
//       },
//       clearUser(state) {
//         state.user = null;
//       },
//     },
//     actions: {
//       logout({ commit }) {
//         // Perform any additional cleanup or API calls if needed
//         commit('clearUser');
//       },
//     },
//     getters: {
//       isLoggedIn: (state) => state.user !== null,
//     },
//   });