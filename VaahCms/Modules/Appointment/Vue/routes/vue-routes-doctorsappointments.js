let routes= [];
let routes_list= [];

import List from '../pages/doctorsappointments/List.vue'
import Form from '../pages/doctorsappointments/Form.vue'
import Item from '../pages/doctorsappointments/Item.vue'

routes_list = {

    path: '/doctorsappointments',
    name: 'doctorsappointments.index',
    component: List,
    props: true,
    children:[
        {
            path: 'form/:id?',
            name: 'doctorsappointments.form',
            component: Form,
            props: true,
        },
        {
            path: 'view/:id?',
            name: 'doctorsappointments.view',
            component: Item,
            props: true,
        }
    ]
};

routes.push(routes_list);

export default routes;

