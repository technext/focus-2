import express from "express";
import dashboard from "./dashboard.mjs";
const router = express.Router();

router.get("/",(req,res)=>{
    res.render('./admin-moderator/index',{
        usertype: "Moderator" //DON'T REMOVE
    });
   
});

router.get("/dashboard", (req,res)=>{
    const Menu = [
        {
            "Menu" : [
                {
                    Title : "Main Menu",
                    Class : "nav-label first",
                    Dropdown : "Home",
                    Icon : "icon icon-single-04",
                    Subitem : [
                        { Name : "Dashboard", Route : "dashboard"}
                    ]
                },
                {
                    Title : "Events Management",
                    Class : "nav-label",
                    Dropdown : "Events",
                    Icon : "icon icon-form",
                    Subitem : [
                        { Name : "Event List", Route : "events"},
                        { Name : "Add Events", Route : "registerevents"}
                    ]
                },
            ]
        }
    ]
    res.render('./admin-moderator/dashboard',{
        path : "moderator",
        Menu : Menu
    });
});

export default router;