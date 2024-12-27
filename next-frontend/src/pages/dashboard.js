import React, { useEffect, useState } from "react";
import DashboardNav from "../components/Dashboard/DashboardNav";
import { Typography, Box, CircularProgress } from "@mui/material";
import DashCard from "../components/Dashboard/DashCard"; // Assuming DashCard is used for some specific content

export default function Dashboard() {


  return (
    <Box sx={{ display: "flex", flexDirection: "column", width: "100%", justifyContent: "center", alignItems: "center" }}>
      <DashboardNav />

    </Box>
  );
}
