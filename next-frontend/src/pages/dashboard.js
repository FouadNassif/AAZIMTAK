import React, { useState } from 'react';
import { Drawer, Box, List, ListItem, ListItemText, IconButton, Typography, Divider } from '@mui/material';
import MenuIcon from '@mui/icons-material/Menu';

export default function dashboard() {
  const [open, setOpen] = useState(false);

  // Function to toggle the sidebar
  const toggleDrawer = () => {
    setOpen(!open);
  };

  return (
    <div>
      {/* Button in the center-left of the screen */}
      <IconButton
        onClick={toggleDrawer}
        sx={{
          position: 'fixed',
          left: '50px', // Adjust this for the position of the button
          top: '50%',
          transform: 'translateY(-50%)',
          backgroundColor: '#00BFFF', // Change button color
          color: '#fff',
          borderRadius: '50%',
          boxShadow: '0px 4px 12px rgba(0, 0, 0, 0.3)',
          zIndex: 1000, // Ensure the button is on top of everything
        }}
      >
        <MenuIcon />
      </IconButton>

      {/* Drawer Sidebar */}
      <Drawer
        anchor="left"
        open={open}
        onClose={toggleDrawer}
        sx={{
          width: 250,
          flexShrink: 0,
          '& .MuiDrawer-paper': {
            width: 250,
            backgroundColor: '#111927', // Drawer background color
            color: '#fff',
            boxSizing: 'border-box',
            borderRight: 'none', // Remove the right border
          },
        }}
      >
        <Box sx={{ width: 250 }}>
          <Typography
            variant="h6"
            sx={{
              padding: '16px',
              textAlign: 'center',
              color: '#fff',
              fontWeight: 'bold',
            }}
          >
            Sidebar
          </Typography>
          <Divider sx={{ backgroundColor: '#333' }} />
          <List>
            <ListItem button>
              <ListItemText primary="Home" />
            </ListItem>
            <ListItem button>
              <ListItemText primary="About" />
            </ListItem>
            <ListItem button>
              <ListItemText primary="Services" />
            </ListItem>
            <ListItem button>
              <ListItemText primary="Contact" />
            </ListItem>
          </List>
        </Box>
      </Drawer>
    </div>
  );
}
