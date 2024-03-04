PGDMP      (                |         
   tramitardb    16.1    16.1 !               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16394 
   tramitardb    DATABASE        CREATE DATABASE tramitardb WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Bolivia.1252';
    DROP DATABASE tramitardb;
                postgres    false            �            1259    16415    accion    TABLE     �   CREATE TABLE public.accion (
    idaccion integer NOT NULL,
    accionnombre character varying(100) NOT NULL,
    accioncondicion smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.accion;
       public         heap    postgres    false            �            1259    16414    accion_idaccion_seq    SEQUENCE     �   CREATE SEQUENCE public.accion_idaccion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.accion_idaccion_seq;
       public          postgres    false    216                       0    0    accion_idaccion_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.accion_idaccion_seq OWNED BY public.accion.idaccion;
          public          postgres    false    215            �            1259    16433 	   categoria    TABLE     �   CREATE TABLE public.categoria (
    idcategoria integer NOT NULL,
    categorianombre character varying(100) NOT NULL,
    categoriacondicion smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.categoria;
       public         heap    postgres    false            �            1259    16432    categoria_idcategoria_seq    SEQUENCE     �   CREATE SEQUENCE public.categoria_idcategoria_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.categoria_idcategoria_seq;
       public          postgres    false    220                       0    0    categoria_idcategoria_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.categoria_idcategoria_seq OWNED BY public.categoria.idcategoria;
          public          postgres    false    219            �            1259    16441    subcategoria    TABLE     �   CREATE TABLE public.subcategoria (
    idsubcategoria integer NOT NULL,
    subcategorianombre character varying(100) NOT NULL,
    idcategoria integer NOT NULL,
    subcategoriacondicion smallint DEFAULT 1 NOT NULL
);
     DROP TABLE public.subcategoria;
       public         heap    postgres    false            �            1259    16440    subcategoria_idsubcategoria_seq    SEQUENCE     �   CREATE SEQUENCE public.subcategoria_idsubcategoria_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.subcategoria_idsubcategoria_seq;
       public          postgres    false    222                       0    0    subcategoria_idsubcategoria_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.subcategoria_idsubcategoria_seq OWNED BY public.subcategoria.idsubcategoria;
          public          postgres    false    221            �            1259    16423    tipo_tramite    TABLE     $  CREATE TABLE public.tipo_tramite (
    idtipo_tramite integer NOT NULL,
    tipo_tramitenombre character varying(100) NOT NULL,
    tipo_tramiteimportante smallint DEFAULT 1 NOT NULL,
    tipo_tramitetiempo integer DEFAULT 0 NOT NULL,
    tipo_tramitecondicion smallint DEFAULT 1 NOT NULL
);
     DROP TABLE public.tipo_tramite;
       public         heap    postgres    false            �            1259    16422    tipo_tramite_idtipo_tramite_seq    SEQUENCE     �   CREATE SEQUENCE public.tipo_tramite_idtipo_tramite_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.tipo_tramite_idtipo_tramite_seq;
       public          postgres    false    218                       0    0    tipo_tramite_idtipo_tramite_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.tipo_tramite_idtipo_tramite_seq OWNED BY public.tipo_tramite.idtipo_tramite;
          public          postgres    false    217            _           2604    16418    accion idaccion    DEFAULT     r   ALTER TABLE ONLY public.accion ALTER COLUMN idaccion SET DEFAULT nextval('public.accion_idaccion_seq'::regclass);
 >   ALTER TABLE public.accion ALTER COLUMN idaccion DROP DEFAULT;
       public          postgres    false    216    215    216            e           2604    16436    categoria idcategoria    DEFAULT     ~   ALTER TABLE ONLY public.categoria ALTER COLUMN idcategoria SET DEFAULT nextval('public.categoria_idcategoria_seq'::regclass);
 D   ALTER TABLE public.categoria ALTER COLUMN idcategoria DROP DEFAULT;
       public          postgres    false    220    219    220            g           2604    16444    subcategoria idsubcategoria    DEFAULT     �   ALTER TABLE ONLY public.subcategoria ALTER COLUMN idsubcategoria SET DEFAULT nextval('public.subcategoria_idsubcategoria_seq'::regclass);
 J   ALTER TABLE public.subcategoria ALTER COLUMN idsubcategoria DROP DEFAULT;
       public          postgres    false    221    222    222            a           2604    16426    tipo_tramite idtipo_tramite    DEFAULT     �   ALTER TABLE ONLY public.tipo_tramite ALTER COLUMN idtipo_tramite SET DEFAULT nextval('public.tipo_tramite_idtipo_tramite_seq'::regclass);
 J   ALTER TABLE public.tipo_tramite ALTER COLUMN idtipo_tramite DROP DEFAULT;
       public          postgres    false    217    218    218                      0    16415    accion 
   TABLE DATA           I   COPY public.accion (idaccion, accionnombre, accioncondicion) FROM stdin;
    public          postgres    false    216   i&                 0    16433 	   categoria 
   TABLE DATA           U   COPY public.categoria (idcategoria, categorianombre, categoriacondicion) FROM stdin;
    public          postgres    false    220   �&                 0    16441    subcategoria 
   TABLE DATA           n   COPY public.subcategoria (idsubcategoria, subcategorianombre, idcategoria, subcategoriacondicion) FROM stdin;
    public          postgres    false    222   ;'                 0    16423    tipo_tramite 
   TABLE DATA           �   COPY public.tipo_tramite (idtipo_tramite, tipo_tramitenombre, tipo_tramiteimportante, tipo_tramitetiempo, tipo_tramitecondicion) FROM stdin;
    public          postgres    false    218   q'                  0    0    accion_idaccion_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.accion_idaccion_seq', 17, true);
          public          postgres    false    215                       0    0    categoria_idcategoria_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.categoria_idcategoria_seq', 2, true);
          public          postgres    false    219                       0    0    subcategoria_idsubcategoria_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.subcategoria_idsubcategoria_seq', 2, true);
          public          postgres    false    221                       0    0    tipo_tramite_idtipo_tramite_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.tipo_tramite_idtipo_tramite_seq', 2, true);
          public          postgres    false    217            j           2606    16421    accion accion_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.accion
    ADD CONSTRAINT accion_pkey PRIMARY KEY (idaccion);
 <   ALTER TABLE ONLY public.accion DROP CONSTRAINT accion_pkey;
       public            postgres    false    216            n           2606    16439    categoria categoria_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (idcategoria);
 B   ALTER TABLE ONLY public.categoria DROP CONSTRAINT categoria_pkey;
       public            postgres    false    220            p           2606    16447    subcategoria subcategoria_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.subcategoria
    ADD CONSTRAINT subcategoria_pkey PRIMARY KEY (idsubcategoria);
 H   ALTER TABLE ONLY public.subcategoria DROP CONSTRAINT subcategoria_pkey;
       public            postgres    false    222            l           2606    16431    tipo_tramite tipo_tramite_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.tipo_tramite
    ADD CONSTRAINT tipo_tramite_pkey PRIMARY KEY (idtipo_tramite);
 H   ALTER TABLE ONLY public.tipo_tramite DROP CONSTRAINT tipo_tramite_pkey;
       public            postgres    false    218            q           2606    16448    subcategoria idcategoria    FK CONSTRAINT     �   ALTER TABLE ONLY public.subcategoria
    ADD CONSTRAINT idcategoria FOREIGN KEY (idcategoria) REFERENCES public.categoria(idcategoria) NOT VALID;
 B   ALTER TABLE ONLY public.subcategoria DROP CONSTRAINT idcategoria;
       public          postgres    false    222    4718    220               ~   x�-�K!D������2�D�b�W������yP�K�	���Tk�jO��Y�f�(�5�Έ���HFT������XԆ����
d~F��ҥ6��N����n�6��7x��J���c\�C��S'�         4   x�3�	r��qUpw�sr��4�2���s�W8<�����(���� 
�         &   x�3�tr��qV��s�u�qr89�b���� �(         .   x�3�
uur�4�445�4�2��	�Wpq��4����qqq �x<     