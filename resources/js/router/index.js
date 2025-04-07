import { createRouter, createWebHashHistory } from "vue-router";
import AppLayout from "@/layout/AppLayout.vue";

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: "/",
            component: AppLayout,
            children: [
                {
                    path: "/",
                    name: "dashboard",
                    component: () => import("@/views/Dashboard.vue"),
                },
                {
                    path: "/settings",
                    children: [
                        {
                            path: "account",
                            name: "account",
                            component: () =>
                                import("@/views/settings/Account.vue"),
                        },
                    ],
                },
            ],
        },
        {
            path: "/login",
            name: "login",
            component: () => import("@/views/auth/Login.vue"),
        },
    ],
});

export default router;
