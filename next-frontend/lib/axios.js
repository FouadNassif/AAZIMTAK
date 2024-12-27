import axios from "axios";

const axiosInstance = axios.create({
    baseURL: process.env.NEXT_PUBLIC_BACKEND_URL,
    headers: {
        "X-Request-With": "XMLHttpRequest",
    },
    withCredentials: true
})

export default axiosInstance;
