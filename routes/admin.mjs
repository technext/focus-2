import express from "express";
const router = express.Router();


router.get("/",(req,res)=>{
    res.render('./admin-moderator/index',{
        usertype: "Administrator" //DON'T REMOVE
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
                    Title : "Account Management",
                    Class : "nav-label",
                    Dropdown : "Moderators",
                    Icon : "icon icon-app-store",
                    Subitem : [
                        { Name : "Account List", Route : "account"},
                        { Name : "Register Moderator", Route : "register"}
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
        path: "admin",
        Menu : Menu
    });
    
});

export default router;