// src/axiosConfig.js

import axios from 'axios';

// Set the base URL for all axios requests
axios.defaults.baseURL = import.meta.env.API_URL; // Default to localhost if VITE_API_URL is not set
// axios.defaults.baseURL = 'http://10.192.81.1:8000';
// axios.defaults.baseURL = 'http://192.168.8.116:8000';


// Set withCredentials to true for all requests
axios.defaults.withCredentials = true;

// Add a request interceptor
axios.interceptors.request.use(function (config) {
    const token = localStorage.getItem('token'); // Assuming you store the token in localStorage after login
    config.headers.Authorization =  token ? `Bearer ${token}` : '';
    return config;
});

export default axios;