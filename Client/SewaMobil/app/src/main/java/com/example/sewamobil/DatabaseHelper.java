package com.example.sewamobil;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;



public class DatabaseHelper extends SQLiteOpenHelper {

    public static final String DATABASE_NAME = "rentalmobil.db";
    public static final String TABLE_NAME   = "mobil";
    public static final String COL_1 = "id_mobil";
    public static final String COL_2 = "nama_mobil";
    public static final String COL_3 = "merk_mobil";
    public static final String COL_4 = "tahun_mobil";
    public static final String COL_5 = "kapasitas_mobil";
    public static final String COL_6 = "harga_mobil";
    public static final String COL_7 = "warna_mobil";
    public static final String COL_8 = "plat_mobil";

    public DatabaseHelper(Context context){
        super(context, DATABASE_NAME,null,1);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL("create table " + TABLE_NAME +" (id_mobil INTEGER  PRIMARY KEY, nama_mobil TEXT , merk_mobil TEXT, tahun_mobil INTEGER, kapasitas_mobil INTEGER, harga_mobil INTEGER, warna_mobil TEXT,plat_mobil TEXT )");
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int i, int i1) {
        db.execSQL("DROP TABLE IF EXISTS "+TABLE_NAME);
    }

    public boolean insertData(String id_mobil,String nama_mobil,String merk_mobil, int tahun_mobil, int kapasitas_mobil, int harga_mobil, String warna_mobil, String plat_mobil){
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put(COL_1,id_mobil);
        contentValues.put(COL_2,nama_mobil);
        contentValues.put(COL_3,merk_mobil);
        contentValues.put(COL_4,tahun_mobil);
        contentValues.put(COL_8,kapasitas_mobil);
        contentValues.put(COL_5,harga_mobil);
        contentValues.put(COL_6,warna_mobil);
        contentValues.put(COL_7,plat_mobil);

        long result = db.insert(TABLE_NAME  ,null,contentValues);
        if (result == -1)
            return false;
        else
            return true;
    }
    public boolean updateData(String id_mobil,String nama_mobil,String merk_mobil, int tahun_mobil, int kapasitas_mobil, int harga_mobil, String warna_mobil, String plat_mobil) {
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put(COL_1,id_mobil);
        contentValues.put(COL_2,nama_mobil);
        contentValues.put(COL_3,merk_mobil);
        contentValues.put(COL_4,tahun_mobil);
        contentValues.put(COL_8,kapasitas_mobil);
        contentValues.put(COL_5,harga_mobil);
        contentValues.put(COL_6,warna_mobil);
        contentValues.put(COL_7,plat_mobil);

        int result = db.update(TABLE_NAME, contentValues, "nim = ?",new String[] { id_mobil });
        if(result == -1)
            return false;
        else
            return true;
    }

    public boolean deleteData(String id_mobil) {
        SQLiteDatabase db = this.getWritableDatabase();
        int result = db.delete(TABLE_NAME,"nim = ?" ,new String[] { id_mobil});
        if(result == 0)
            return false;
        else
            return true;
    }
    public Cursor getAllData() {
        SQLiteDatabase db = this.getWritableDatabase();
        Cursor res = db.rawQuery("select * from "+TABLE_NAME,null);
        return res;

    }
}
