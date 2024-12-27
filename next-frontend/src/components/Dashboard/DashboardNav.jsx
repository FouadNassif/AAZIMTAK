import React, { useState } from "react";
import {
    Drawer,
    Box,
    List,
    ListItem,
    ListItemText,
    IconButton,
    Typography,
    Divider,
    Collapse,
} from "@mui/material";
import MenuIcon from "@mui/icons-material/Menu";
import ExpandLess from "@mui/icons-material/ExpandLess";
import ExpandMore from "@mui/icons-material/ExpandMore";

export default function DashboardNav() {
    const [drawerOpen, setDrawerOpen] = useState(false);
    const [guestsOpen, setGuestsOpen] = useState(false);
    const [weddingOpen, setWeddingOpen] = useState(false);
    const [accountOpen, setAccountOpen] = useState(false);

    // Toggle the main drawer
    const toggleDrawer = () => {
        setDrawerOpen(!drawerOpen);
    };

    // Toggle each submenu
    const toggleGuests = () => {
        setGuestsOpen(!guestsOpen);
        setWeddingOpen(false);
        setAccountOpen(false);
    };

    const toggleWedding = () => {
        setWeddingOpen(!weddingOpen);
        setGuestsOpen(false);
        setAccountOpen(false);
    };

    const toggleAccount = () => {
        setAccountOpen(!accountOpen);
        setWeddingOpen(false);
        setGuestsOpen(false);
    };

    return (
        <div>
            {/* Button close to the left */}
            <IconButton
                onClick={toggleDrawer}
                sx={{
                    position: "fixed",
                    left: "20px", // Closer to the left
                    top: "50%",
                    transform: "translateY(-50%)",
                    backgroundColor: "#00BFFF",
                    color: "#fff",
                    borderRadius: "50%",
                    boxShadow: "0px 4px 12px rgba(0, 0, 0, 0.3)",
                    zIndex: 1000,
                }}
            >
                <MenuIcon />
            </IconButton>

            {/* Drawer Sidebar */}
            <Drawer
                anchor="left"
                open={drawerOpen}
                onClose={toggleDrawer}
                sx={{
                    width: 250,
                    flexShrink: 0,
                    "& .MuiDrawer-paper": {
                        width: 250,
                        backgroundColor: "#111927",
                        color: "#fff",
                        boxSizing: "border-box",
                        borderRight: "none",
                    },
                }}
            >
                <Box sx={{ width: 250 }}>
                    <Typography
                        variant="h6"
                        sx={{
                            padding: "16px",
                            textAlign: "center",
                            color: "#fff",
                            fontWeight: "bold",
                        }}
                    >
                        AAZIMTAK
                    </Typography>
                    <Typography
                        variant="p"
                        sx={{
                            fontSize: "15px",
                            padding: "16px",
                            textAlign: "center",
                            color: "#f1f1f1",
                            fontWeight: "bold",
                        }}
                    >
                        Welcome Fouad
                    </Typography>
                    <Divider sx={{ backgroundColor: "#333" }} />

                    <List>
                        <ListItem button>
                            <ListItemText primary="Dashboard" />
                        </ListItem>

                        {/* Guests Menu with Dropdown */}
                        <ListItem button onClick={toggleGuests}>
                            <ListItemText primary="Guests" />
                            {guestsOpen ? <ExpandLess /> : <ExpandMore />}
                        </ListItem>
                        <Collapse in={guestsOpen} timeout="auto" unmountOnExit>
                            <List component="div" disablePadding>
                                <ListItem button sx={{ pl: 4 }}>
                                    <ListItemText primary="Show Guests" />
                                </ListItem>
                                <ListItem button sx={{ pl: 4 }}>
                                    <ListItemText primary="Add Guests" />
                                </ListItem>
                            </List>
                        </Collapse>

                        {/* Wedding Menu with Dropdown */}
                        <ListItem button onClick={toggleWedding}>
                            <ListItemText primary="Wedding" />
                            {weddingOpen ? <ExpandLess /> : <ExpandMore />}
                        </ListItem>
                        <Collapse in={weddingOpen} timeout="auto" unmountOnExit>
                            <List component="div" disablePadding>
                                <ListItem button sx={{ pl: 4 }}>
                                    <ListItemText primary="Edit Wedding" />
                                </ListItem>
                                <ListItem button sx={{ pl: 4 }}>
                                    <ListItemText primary="Show Wedding" />
                                </ListItem>
                            </List>
                        </Collapse>

                        {/* Account Menu with Dropdown */}
                        <ListItem button onClick={toggleAccount}>
                            <ListItemText primary="Account" />
                            {accountOpen ? <ExpandLess /> : <ExpandMore />}
                        </ListItem>
                        <Collapse in={accountOpen} timeout="auto" unmountOnExit>
                            <List component="div" disablePadding>
                                <ListItem button sx={{ pl: 4 }}>
                                    <ListItemText primary="Edit Account" />
                                </ListItem>
                                <ListItem button sx={{ pl: 4 }}>
                                    <ListItemText primary="Log Out" />
                                </ListItem>
                            </List>
                        </Collapse>
                    </List>
                </Box>
            </Drawer>
        </div>
    );
}
