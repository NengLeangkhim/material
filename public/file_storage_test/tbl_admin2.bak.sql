PGDMP                         x            DBAdmin    12.2    12.2     %           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            &           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            '           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            (           1262    16394    DBAdmin    DATABASE     �   CREATE DATABASE "DBAdmin" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
    DROP DATABASE "DBAdmin";
                postgres    false            �            1259    16395 
   tbl_admin2    TABLE     �   CREATE TABLE public.tbl_admin2 (
    id text NOT NULL,
    name text,
    password text,
    department text,
    "position" text
);
    DROP TABLE public.tbl_admin2;
       public         heap    postgres    false            "          0    16395 
   tbl_admin2 
   TABLE DATA           P   COPY public.tbl_admin2 (id, name, password, department, "position") FROM stdin;
    public          postgres    false    203   �       �
           2606    16402    tbl_admin2 tbl_admin2_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.tbl_admin2
    ADD CONSTRAINT tbl_admin2_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.tbl_admin2 DROP CONSTRAINT tbl_admin2_pkey;
       public            postgres    false    203            "   j   x�=˱
�@E����(�@l�F�L� K�a�~���7��0(vBD0>q{����%Ce%T��7������z��a�7L��?�����p]����)�5�!�     