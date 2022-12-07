import { createStore } from 'vuex'

export default createStore({
  state: {
    cart:[],
    list:[]
  },
  getters: {
  },
  mutations: {
    setCart(state,list){
      state.cart=list
    },
    addCart(state,item){
      state.cart.push(item)
    },
    updateItem(state,item) {
      const id = item.id;
      const amount = item.amount;
      state.cart.find(v => v.id === id).amount = amount;
    },
  },
  actions: {
    setCart({commit},list){
      commit("setCart",list)
    },
    addCart({commit},item){
      commit("addCart",item)
    },
    updateItem({commit},item){
      commit("updateItem",item)
    },
  },
  modules: {
  }
})
