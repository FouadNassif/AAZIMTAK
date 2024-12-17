import React from "react";
import ArrowBackIcon from '@mui/icons-material/ArrowBack';
import { Box, TextField, Link, Avatar, Typography, Button } from "@mui/material";
import { useRouter } from "next/router";

export default function Login() {
    const router = useRouter();
    return (
        <form action="/api/login" method="POST">
            <Box
                sx={{
                    backgroundColor: "#111927",
                    backgroundImage:
                        "radial-gradient(at 47% 33%, hsl(218.49, 62%, 33%) 0, transparent 59%), radial-gradient(at 82% 65%, hsl(218.00, 39%, 11%) 0, transparent 55%)",
                    width: "100%",
                    height: "100vh",
                    display: "flex",
                    justifyContent: "center",
                    alignItems: "center",
                    color: "#FFF",
                }}
            >

                <Box
                    sx={{
                        backdropFilter: "blur(10px) saturate(200%)",
                        WebkitBackdropFilter: "blur(10px) saturate(200%)",
                        backgroundColor: "rgba(17, 25, 40, 0.9)",
                        borderRadius: "12px",
                        border: "1px solid rgba(255, 255, 255, 0.15)",
                        padding: "32px",
                        display: "flex",
                        flexDirection: "column",
                        gap: "24px",
                        width: "400px",
                        boxShadow: "0 4px 20px rgba(0, 0, 0, 0.5)",
                    }}
                >
                    <Link onClick={() => router.back()}>
                        <Button variant="outlined" startIcon={<ArrowBackIcon />} sx={{
                            width: "fit-content"
                        }}>
                            Back
                        </Button>
                    </Link>

                    {/* Logo and Title */}
                    <Box display="flex" alignItems="center" className="flex-1">
                        <Link href="/" underline="none">
                            <Avatar
                                alt="Aazimtak Logo"
                                src="/assets/img/Alogo.png"
                                sx={{ width: 50, height: 50 }}
                            />
                        </Link>
                        <Typography
                            variant="h5"
                            sx={{
                                marginLeft: 2,
                                fontWeight: 700,
                                color: "#FFF",
                            }}
                        >
                            AAZIMTAK
                        </Typography>
                    </Box>

                    {/* Input Fields */}
                    <TextField
                        id="username-input"
                        label="Username"
                        type="ematextil"
                        autoComplete="name"
                        fullWidth
                        variant="outlined"
                        sx={{
                            "& .MuiInputBase-root": {
                                backgroundColor: "rgba(255, 255, 255, 0.1)",
                                borderRadius: "8px",
                            },
                            "& .MuiInputLabel-root": {
                                color: "#CCC",
                            },
                            "& .MuiInputLabel-root.Mui-focused": {
                                color: "#FFF",
                            },
                            "& .MuiOutlinedInput-root": {
                                "& fieldset": {
                                    borderColor: "rgba(255, 255, 255, 0.2)",
                                },
                                "&:hover fieldset": {
                                    borderColor: "#FFF",
                                },
                                "&.Mui-focused fieldset": {
                                    borderColor: "#00BFFF",
                                    color: "#FFF"
                                },
                            },
                        }}
                    />
                    <TextField
                        id="password-input"
                        label="Password"
                        type="password"
                        autoComplete="current-password"
                        fullWidth
                        variant="outlined"
                        sx={{
                            "& .MuiInputBase-root": {
                                backgroundColor: "rgba(255, 255, 255, 0.1)",
                                borderRadius: "8px",
                            },
                            "& .MuiInputLabel-root": {
                                color: "#CCC",
                            },
                            "& .MuiInputLabel-root.Mui-focused": {
                                color: "#FFF",
                            },
                            "& .MuiOutlinedInput-root": {
                                "& fieldset": {
                                    borderColor: "rgba(255, 255, 255, 0.2)",
                                },
                                "&:hover fieldset": {
                                    borderColor: "#FFF",
                                },
                                "&.Mui-focused fieldset": {
                                    borderColor: "#00BFFF",
                                },
                            },
                        }}
                    />

                    {/* Action Buttons */}
                    <Button
                        variant="contained"
                        color="primary"
                        fullWidth
                        type="submit"
                        sx={{
                            padding: "10px 16px",
                            backgroundColor: "#00BFFF",
                            borderRadius: "8px",
                            fontWeight: "bold",
                            "&:hover": {
                                backgroundColor: "#0099CC",
                            },
                        }}
                    >
                        Log In
                    </Button>

                    {/* Terms and Services */}
                    <Typography
                        sx={{
                            textAlign: "center",
                            fontSize: "0.875rem",
                            color: "#CCC",
                        }}
                    >
                        By logging in, you agree to our{" "}
                        <Link
                            href="/terms"
                            sx={{
                                color: "#00BFFF",
                                fontWeight: 600,
                                textDecoration: "none",
                                "&:hover": {
                                    textDecoration: "underline",
                                },
                            }}
                        >
                            Terms and Services
                        </Link>
                    </Typography>
                </Box>
            </Box>
        </form>
    );
}
