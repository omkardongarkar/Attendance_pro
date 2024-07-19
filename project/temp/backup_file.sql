--
-- PostgreSQL database dump
--

-- Dumped from database version 14.8 (Ubuntu 14.8-0ubuntu0.22.04.1)
-- Dumped by pg_dump version 14.8 (Ubuntu 14.8-0ubuntu0.22.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: attendance; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.attendance (
    stud_id character varying,
    date date,
    status character varying DEFAULT 'A'::character varying
);


ALTER TABLE public.attendance OWNER TO postgres;

--
-- Name: class; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.class (
    id integer NOT NULL,
    class_name character varying(255) NOT NULL,
    teacher_id integer,
    subjects character varying(255)[]
);


ALTER TABLE public.class OWNER TO postgres;

--
-- Name: class_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.class_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.class_id_seq OWNER TO postgres;

--
-- Name: class_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.class_id_seq OWNED BY public.class.id;


--
-- Name: department_heads; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.department_heads (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    phone character varying(10),
    img bytea
);


ALTER TABLE public.department_heads OWNER TO postgres;

--
-- Name: department_heads_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.department_heads_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.department_heads_id_seq OWNER TO postgres;

--
-- Name: department_heads_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.department_heads_id_seq OWNED BY public.department_heads.id;


--
-- Name: images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.images (
    id integer NOT NULL,
    file_name character varying(255) NOT NULL,
    file_path character varying(255) NOT NULL,
    file_size integer NOT NULL,
    file_type character varying(255) NOT NULL
);


ALTER TABLE public.images OWNER TO postgres;

--
-- Name: images_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.images_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.images_id_seq OWNER TO postgres;

--
-- Name: images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.images_id_seq OWNED BY public.images.id;


--
-- Name: students; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.students (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    username character varying(255),
    phone character varying(255),
    p_phone character varying(255),
    department_name character varying(255) NOT NULL,
    class character varying(255),
    admission_date date,
    division character varying(2),
    img character varying(255)
);


ALTER TABLE public.students OWNER TO postgres;

--
-- Name: teachers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.teachers (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    username character varying(255),
    phone character varying(10),
    department_name character varying(255),
    qualification character varying(255),
    d_role character varying(50)
);


ALTER TABLE public.teachers OWNER TO postgres;

--
-- Name: teachers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.teachers_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.teachers_id_seq OWNER TO postgres;

--
-- Name: teachers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.teachers_id_seq OWNED BY public.teachers.id;


--
-- Name: class id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.class ALTER COLUMN id SET DEFAULT nextval('public.class_id_seq'::regclass);


--
-- Name: department_heads id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.department_heads ALTER COLUMN id SET DEFAULT nextval('public.department_heads_id_seq'::regclass);


--
-- Name: images id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.images ALTER COLUMN id SET DEFAULT nextval('public.images_id_seq'::regclass);


--
-- Name: teachers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.teachers ALTER COLUMN id SET DEFAULT nextval('public.teachers_id_seq'::regclass);


--
-- Data for Name: attendance; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.attendance (stud_id, date, status) FROM stdin;
20FCS011	2023-05-11	P
20FCS033	2023-05-11	P
20FCS034	2023-05-11	P
20FCS001	2023-05-11	P
20FCS002	2023-05-11	P
1	2023-05-11	P
2	2023-05-11	P
3	2023-05-11	P
20FCS044	2023-05-11	P
20FCS107	2023-05-11	P
21FCS001	2023-05-11	P
21FCS202	2023-05-11	P
22FCS011	2023-05-11	P
20FCS052	2023-05-11	P
20FCS011	2023-05-12	P
20FCS033	2023-05-12	P
20FCS034	2023-05-12	P
20FCS001	2023-05-12	P
20FCS002	2023-05-12	P
1	2023-05-12	P
2	2023-05-12	P
3	2023-05-12	P
20FCS044	2023-05-12	P
20FCS107	2023-05-12	P
21FCS001	2023-05-12	P
21FCS202	2023-05-12	P
22FCS011	2023-05-12	P
20FCS052	2023-05-12	P
20FCS011	2023-05-10	A
20FCS033	2023-05-10	P
20FCS034	2023-05-10	A
20FCS001	2023-05-10	P
20FCS002	2023-05-10	P
1	2023-05-10	P
2	2023-05-10	P
3	2023-05-10	A
20FCS044	2023-05-10	P
20FCS107	2023-05-10	P
21FCS001	2023-05-10	A
21FCS202	2023-05-10	P
22FCS011	2023-05-10	A
20FCS052	2023-05-10	A
20FCS011	2023-05-21	A
20FCS033	2023-05-21	A
20FCS034	2023-05-21	A
20FCS001	2023-05-21	A
20FCS002	2023-05-21	A
1	2023-05-21	A
2	2023-05-21	A
3	2023-05-21	A
20FCS044	2023-05-21	A
20FCS107	2023-05-21	A
21FCS001	2023-05-21	A
21FCS202	2023-05-21	A
22FCS011	2023-05-21	A
20FCS052	2023-05-21	A
\.


--
-- Data for Name: class; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.class (id, class_name, teacher_id, subjects) FROM stdin;
\.


--
-- Data for Name: department_heads; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.department_heads (id, name, email, password, username, phone, img) FROM stdin;
1	amol tribhuwan	amoltribhuwan05@gmail.com	12345	amol	8329949643	\N
\.


--
-- Data for Name: images; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.images (id, file_name, file_path, file_size, file_type) FROM stdin;
11	4.png	uploads/4.png	186597	image/png
12	5.png	uploads/5.png	266555	image/png
\.


--
-- Data for Name: students; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.students (id, name, email, password, username, phone, p_phone, department_name, class, admission_date, division, img) FROM stdin;
20FCS011	Amol Sanjay Tribhuwan	amoltribhuwan09@gmail.com	Amolt@123	amol123	7517686049	9921083694	computer science	ty	2023-04-01	A	\N
20FCS033	Karan Toge	karantoge26@gmail.com	laran123	karan123	7120381876	7120381874	computer science	ty	2021-08-18	A	\N
20FCS034	Dipak Toge	dipak@gmail.com	dipak	dips	6543818763	7120381874	computer science	ty	2021-08-20	A	\N
20FCS001	Shubham Sonawane	shubham@gmail.com	Shubham123	Shubham	9876543323	9876543323	computer science	ty	2020-08-04	A	\N
20FCS002	Kailas Rahane	kailas@gmail.com	12345	kailas	7634669394	7634669394	computer science	ty	2023-04-04	A	\N
1	Akash Salave	akash@gmail.com	akash	ak123	9999887777	8888996666	computer science	ty	2021-08-23	A	\N
2	Sunil nale	sunil@gmail.com	sunil	sn123	9999883777	8828996666	computer science	ty	2021-08-25	A	\N
3	omkar sahane	om@gmail.com	omkar	om123	6999883777	8828998666	computer science	ty	2021-08-18	A	\N
20FCS044	vishal vishwakarma	vishal@gmail.com	vishal	vishal	6564736746	6561736746	computer science	ty	2021-09-01	A	\N
20FCS107	Eshwar Kadam	testmail@gmail.com	eshu123	Eshwar kadam	7541384176	7541324176	computer science	ty	2021-08-01	A	\N
21FCS001	avinash kale	avinash@gmail.com	avi@123	avi	7346364434	7346264434	IT	fy	2021-03-31	A	\N
21FCS202	akshay rahane	akshay@gmail.com	akshay	akshay	5283286382	2837273921	IT	fy	2021-08-01	A	\N
22FCS011	satyam varpe	satya@gmail.com	demo	satya	8754634834	8754634834	IT	sy	2022-08-21	A	\N
20FCS052	nilesh wagh	nilesh@gmail.com	nilesh	nilesh	2873433263	2873431263	bsc	sy	2020-08-02	A	\N
\.


--
-- Data for Name: teachers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.teachers (id, name, email, password, username, phone, department_name, qualification, d_role) FROM stdin;
1	Abhijeet Satpute	abhijeet@gmail.com	abhi	abhi123	9999977777	computer science	bsc	\N
2	Girish sonawane	girishsonawane999@gmail.com	girish@123	Girish	9876548898	computer science	bsc	\N
\.


--
-- Name: class_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.class_id_seq', 1, false);


--
-- Name: department_heads_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.department_heads_id_seq', 1, false);


--
-- Name: images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.images_id_seq', 12, true);


--
-- Name: teachers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.teachers_id_seq', 1, false);


--
-- Name: class class_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.class
    ADD CONSTRAINT class_pkey PRIMARY KEY (id);


--
-- Name: department_heads department_heads_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.department_heads
    ADD CONSTRAINT department_heads_pkey PRIMARY KEY (id);


--
-- Name: images images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.images
    ADD CONSTRAINT images_pkey PRIMARY KEY (id);


--
-- Name: students students_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_pkey PRIMARY KEY (id);


--
-- Name: teachers teachers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.teachers
    ADD CONSTRAINT teachers_pkey PRIMARY KEY (id);


--
-- Name: attendance attendance_stud_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.attendance
    ADD CONSTRAINT attendance_stud_id_fkey FOREIGN KEY (stud_id) REFERENCES public.students(id);


--
-- Name: class class_teacher_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.class
    ADD CONSTRAINT class_teacher_id_fkey FOREIGN KEY (teacher_id) REFERENCES public.teachers(id);


--
-- PostgreSQL database dump complete
--

