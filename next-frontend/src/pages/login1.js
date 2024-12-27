import React, { useState, FormEvent } from "react";
import ArrowBackIcon from "@mui/icons-material/ArrowBack";

import {
    Box,
    TextField,
    Link,
    Avatar,
    Typography,
    Button,
    Alert,
    AlertTitle,
} from "@mui/material";
import { useRouter } from "next/router";
import Cookies from 'js-cookie';
import { useAuth } from "../../hooks/auth";

export default function Login1() {
    const [username, setUsername] = useState("");
    const [password, setPassword] = useState("");
    const [error, setError] = useState(null);  // Error state to hold error messages
    const router = useRouter();

    // Auth Hook
    const { login, isLoading, user } = useAuth({ middleware: "guest" });

    // Check Loading and User
    if (isLoading || user) {
        return (
            <>
                Is Loading...
            </>
        )
    }

    // Submit our form
    const submitForm = async (e) => {
        e.preventDefault();
        try {
            await login({ username, password, setError });
        } catch (err) {
            // You can handle this case if the login fails due to other errors
            setError("An error occurred. Please try again.");
        }
    };
    

    return (
        <form onSubmit={submitForm} method="POST">
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
                    <Button
                        variant="outlined"
                        startIcon={<ArrowBackIcon />}
                        onClick={() => router.back()}
                    >
                        Back
                    </Button>

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
                            sx={{ marginLeft: 2, fontWeight: 700 }}
                        >
                            AAZIMTAK
                        </Typography>
                    </Box>

                    <TextField
                        id="username-input"
                        label="Username"
                        type="text"
                        autoComplete="name"
                        value={username}
                        onChange={(e) => setUsername(e.target.value)}
                        fullWidth
                        required
                        variant="outlined"
                        sx={{
                            "& .MuiInputBase-root": {
                                backgroundColor: "rgba(255, 255, 255, 0.1)",
                                borderRadius: "8px",
                            },
                            "& .MuiInputLabel-root": { color: "#CCC" },
                            "& .MuiOutlinedInput-root": {
                                "& fieldset": {
                                    borderColor: "rgba(255, 255, 255, 0.2)",
                                },
                                "&:hover fieldset": { borderColor: "#FFF" },
                                "&.Mui-focused fieldset": {
                                    borderColor: "#00BFFF",
                                },
                            },
                        }}
                    />
                    <TextField
                        id="password-input"
                        label="Password"
                        type="password"
                        autoComplete="current-password"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                        fullWidth
                        required
                        variant="outlined"
                    />

                    <Button
                        variant="contained"
                        color="primary"
                        fullWidth
                        type="submit"
                        sx={{
                            backgroundColor: "#00BFFF",
                            borderRadius: "8px",
                            fontWeight: "bold",
                            "&:hover": { backgroundColor: "#0099CC" },
                        }}
                        disabled={isLoading}
                    >
                        {isLoading ? "Logging in..." : "Log In"}
                    </Button>

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
                            sx={{ color: "#00BFFF", fontWeight: 600 }}
                        >
                            Terms and Services
                        </Link>
                    </Typography>
                </Box>
                {error && (
                    <Alert
                        severity="error"
                        sx={{ position: "absolute", top: "10px", left: "10px" }}
                    >
                        <AlertTitle>Error</AlertTitle>
                        {error}
                    </Alert>
                )}
            </Box>
        </form>
    );
}
