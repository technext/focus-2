import express from "express";
const router = express.Router();

router.get("/dashboard" ,(req,res)=>{
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
                    Title : "Events Manager",
                    Class : "nav-label",
                    Dropdown : "Events",
                    Icon : "icon icon-form",
                    Subitem : [
                        { Name : "List View", Route : "eventslist"},
                        { Name : "Calendar View", Route : "calendar"}
                    ]
                },
            ]
        }
    ]
    res.render('./students/dashboard',{
        path: "student",
        Menu : Menu
    });
});
router.get("/" ,(req,res)=>{
    res.render('./students/index');
});

export default router;