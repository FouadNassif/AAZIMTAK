// src/components/Navbar.jsx
import React from "react";
import {
    AppBar,
    Toolbar,
    Typography,
    Button,
    Box,
    Avatar,
    Link,
} from "@mui/material";
import { useAuth } from "../../hooks/auth";

export default function Navbar() {
    const { user, logout } = useAuth();
    return (
        <AppBar sx={{ backgroundColor: "white" }} position="sticky">
            <Toolbar>
                <Box
                    sx={{
                        display: "flex",
                        width: "100%",
                        justifyContent: "space-between",
                    }}
                >
                    <Box display="flex" alignItems="center" className="flex-1">
                        <Link href="/">
                            <Avatar
                                alt="Aazimtak Logo"
                                src="/assets/img/Alogo.png"
                                sx={{ width: 40 }}
                            />
                        </Link>
                        <Typography
                            variant="h6"
                            sx={{
                                marginLeft: 1,
                                fontWeight: 700,
                                color: "#333",
                            }}
                        >
                            AAZIMTAK
                        </Typography>
                    </Box>

                    <Box
                        display="flex"
                        alignItems="center"
                        className="space-x-4"
                    >
                        <Link
                            sx={{
                                color: "2a5298",
                                fontWeight: "800",
                                cursor: "pointer",
                                padding: "10px 20px",
                            }}
                            underline="none"
                        >
                            Home
                        </Link>

                        <Link
                            sx={{
                                color: "2a5298",
                                fontWeight: "800",
                                cursor: "pointer",
                                padding: "10px 20px",
                            }}
                            underline="none"
                        >
                            Pricing & Preview
                        </Link>
                        {user ? (
                            <>
                                <Link
                                    href="/dashboard"
                                    sx={{
                                        color: "2a5298",
                                        fontWeight: "800",
                                        cursor: "pointer",
                                        padding: "10px 20px",
                                    }}
                                    underline="none"
                                >
                                    Dashboard
                                </Link>
                                <Button
                                    variant="contained"
                                    color="primary"
                                    onClick={logout}
                                    sx={{
                                        backgroundColor: "#00BFFF",
                                        borderRadius: "8px",
                                        fontWeight: "bold",
                                        "&:hover": {
                                            backgroundColor: "#0099CC",
                                        },
                                    }}
                                >
                                    Logout
                                </Button>
                            </>
                        ) : (
                            <Link
                                href="/login"
                                sx={{
                                    color: "2a5298",
                                    fontWeight: "800",
                                    cursor: "pointer",
                                    padding: "10px 20px",
                                }}
                                underline="none"
                            >
                                Login
                            </Link>
                        )}
                    </Box>
                </Box>
            </Toolbar>
        </AppBar>
    );
}
