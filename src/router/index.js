import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/RailwayTour',
    name: 'RailwayTour',
    component: () => import('../views/RailwayTour.vue')
  },
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
    component: () => import('../views/AboutView.vue')
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
    path: '/travel',
    name: 'travel',
    component: () => import('../views/TravelView.vue')
  },
  {
    path: '/sign',
    name: 'sign',
    component: () => import('../views/SignView.vue')
  },
  {
    path: '/news',
    name: 'news',
    component: () => import('../views/NewsView.vue'),
  },
  // ------test 2 ------動態路由
  {
    path: '/newsInfo/:id',
    name: 'newsInfo',
    component: () =>import('../views/NewsInfoView.vue'),
  },
  {
    path: '/shop',
    name: 'shop',
    component: () => import('../views/ShopView.vue')
  },
  {
    path: '/shop/:id',
    name: 'shopcontent',
    component: () => import('../views/ShopContent.vue'),
    // props:true
  },
  {
    path: '/shopcart',
    name: 'shopcart',
    component: () => import('../views/ShopCart.vue')
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
    path: '/faq',
    name: 'faq',
    component: () => import('../views/FaqView.vue')
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('../views/loginView.vue')
  },
  {
    path: '/signup',
    name: 'signup',
    component: () => import('../views/SignupView.vue')
  },
  {
    path: '/forgotpassword',
    name: 'forgotpassword',
    component: () => import('../views/ForgotpasswordView.vue')
  },
  {
    path: '/Resetpsw',
    name: 'Resetpsw',
    component: () => import('../views/ResetpswView.vue')
  },
  {
    path: '/Signin_suc',
    name: 'Signin_suc',
    component: () => import('../views/Signin_sucView.vue')
  },
  {
    path: '/Travelcheck_suc',
    name: 'Travelcheck_suc',
    component: () => import('../views/Travelcheck_sucView.vue')
  },
  {
    path: '/Signup_suc',
    name: 'Signup_suc',
    component: () => import('../views/Signup_sucView.vue')
  },
  {
    path: '/Contactus',
    name: 'Contactus',
    component: () => import('../views/ContactusView.vue')
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