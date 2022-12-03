import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/news',
    name: 'news',
    component: () => import('../views/NewsView.vue')
  },
  {
    path: '/membership',
    name: 'membership',
    component: () => import('../views/MembershipView.vue')
  },
  {
    path: '/header',
    name: 'header',
    component: () => import('../views/HeaderView.vue')
  },
  {
    //----------Header--------------------
    path: '/train',
    name: 'train',
    component: () => import('../views/TrainView.vue')
  },
  {
    path: '/travel',
    name: 'travel',
    component: () => import('../views/TravelView.vue')
  },
  {
    path: '/travelcontent',
    name: 'travelcontent',
    component: () => import('../views/TravelcontentView.vue')
  },
  {
    path: '/travelcheck',
    name: 'travelcheck',
    component: () => import('../views/TravelcheckView.vue')
  },
  {
    path: '/sign',
    name: 'sign',
    component: () => import('../views/SignView.vue')
  },
  {
    path: '/news',
    name: 'news',
    component: () => import('../views/NewsView.vue')
  },
  {
    path: '/shop',
    name: 'shop',
    component: () => import('../views/ShopView.vue')
  },
  {
    path: '/shopcontent',
    name: 'shopcontent',
    component: () => import('../views/ShopContent.vue')
  },
  {
    path: '/about',
    name: 'about',
    component: () => import('../views/AboutView.vue')
  },
  {
    path: '/header',
    name: 'header',
    component: () => import('../views/HeaderView.vue')
  },
  //------------------------------
  {
    path: '/Input',
    name: 'Input',
    component: () => import('../views/InputView.vue')
  },
  {
    path: '/newscontent',
    name: 'newscontent',
    component: () => import('../views/NewscontentView.vue')
  },
  {
    path: '/QA',
    name: 'QA',
    component: () => import('../views/QAView.vue')
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('../views/loginView.vue')
  },
]

// router 跳轉畫面後，維持置頂
const scrollBehavior = (to, from, savedPosition) => {
	if(savedPosition && to.meta.keepAlive){
		return savedPosition;
	}
	return {left: 0, top: 0}
}

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  scrollBehavior
})

export default router