let routes= [];

import dashboard from "./vue-routes-dashboard";
import doctorsappointments from "./vue-routes-doctorsappointments";

routes = routes.concat(dashboard);
routes = routes.concat(doctorsappointments);

export default routes;
