package com.example.sewamobil;

import androidx.appcompat.app.AppCompatActivity;

import android.app.AlertDialog;
import android.database.Cursor;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
    DatabaseHelper myDb;
    EditText inpIdMobil,inpNamaMobil, inpMerkMobil,inpTahunMobil,inpKapasitasMobil,inpHargaMobil,inpWarnaMobil,inpPlatMobil;
    Button btnAdd;
    Button btnEdit;
    Button btnDelete;
    Button btnView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        myDb = new DatabaseHelper(this);
        inpIdMobil= (EditText)findViewById(R.id.inpIdMobil);
        inpNamaMobil = (EditText)findViewById(R.id.inpNamaMobil);
        inpMerkMobil = (EditText)findViewById(R.id.inpMerkMobil);
        inpTahunMobil = (EditText)findViewById(R.id.inpTahunMobil);
        inpKapasitasMobil = (EditText)findViewById(R.id.inpKapasitasMobil);
        inpHargaMobil = (EditText)findViewById(R.id.inpHargaMobil);
        inpWarnaMobil = (EditText)findViewById(R.id.inpWarnaMobil);
        inpPlatMobil = (EditText)findViewById(R.id.inpPlatMobil);
        btnAdd = (Button)findViewById(R.id.btnAdd);
        btnEdit = (Button)findViewById(R.id.btnEdit);
        btnDelete= (Button)findViewById(R.id.btnDelete);
        btnView= (Button)findViewById(R.id.btnView);

        addAction();
        editAction();
        deleteAction();
        showAllAction();

    }
    public void addAction(){
        btnAdd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                boolean isInserted = myDb.insertData(inpIdMobil.getText().toString(),
                                inpNamaMobil.getText().toString(),
                                inpMerkMobil.getText().toString(),
                                Integer.parseInt(inpTahunMobil.getText().toString()),
                                Integer.parseInt(inpKapasitasMobil.getText().toString()),
                                Integer.parseInt(inpHargaMobil.getText().toString()),
                                inpWarnaMobil.getText().toString(),
                                inpPlatMobil.getText().toString());
                        if(isInserted == true)
                            Toast.makeText(MainActivity.this,
                                    "Data Berhasil Ditambahkan",Toast.LENGTH_LONG).show();
                        else
                            Toast.makeText(MainActivity.this,
                                    "Data Gagal Ditambahkan",Toast.LENGTH_LONG).show();

            }
        });

    }
    public void editAction() {
        btnEdit.setOnClickListener(
                new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        boolean isUpdated = myDb.updateData(inpIdMobil.getText().toString(),
                                inpNamaMobil.getText().toString(),
                                inpMerkMobil.getText().toString(),
                                Integer.parseInt(inpTahunMobil.getText().toString()),
                                Integer.parseInt(inpKapasitasMobil.getText().toString()),
                                Integer.parseInt(inpHargaMobil.getText().toString()),
                                inpWarnaMobil.getText().toString(),
                                inpPlatMobil.getText().toString());
                        if(isUpdated == true)
                            Toast.makeText(MainActivity.this,
                                    "Data Berhasil Ditambahkan",Toast.LENGTH_LONG).show();
                        else
                            Toast.makeText(MainActivity.this,
                                    "Data Gagal Ditambahkan",Toast.LENGTH_LONG).show();
                    }
                }
        );
    }
    public void deleteAction() {
        btnDelete.setOnClickListener(
                new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        String id_mobil = inpIdMobil.getText().toString();
                        boolean deletedRows = myDb.deleteData(id_mobil);
                        if(deletedRows)
                            Toast.makeText(MainActivity.this,
                                    "Data Berhasil Dihapus",
                                    Toast.LENGTH_LONG).show();
                        else
                            Toast.makeText(MainActivity.this,
                                    "NIM tidak terdaftar",
                                    Toast.LENGTH_LONG).show();
                    }
                }
        );
    }
    public void showMessage(String title,String Message){
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setCancelable(true);
        builder.setTitle(title);
        builder.setMessage(Message);
        builder.show();
    }
    public void showAllAction() {
        btnView.setOnClickListener(
                new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        Cursor res = myDb.getAllData();
                        if(res.getCount() == 0) {
                            // show message
                            showMessage("Error","Nothing found");
                            return;
                        }
                        StringBuffer buffer = new StringBuffer();
                        while (res.moveToNext()) {
                            buffer.append("Id Mobil :"+ res.getString(0)+"\n");
                            buffer.append("Nama Mobil :"+ res.getString(1)+"\n");
                            buffer.append("Merk Mobil :"+ res.getString(2)+"\n");
                            buffer.append("Tahun Mobil :"+ res.getInt(3)+"\n");
                            buffer.append("Kapasitas Mobil :"+ res.getInt(4)+"\n");
                            buffer.append("Harga Mobil :"+ res.getInt(5)+"\n\n");
                            buffer.append("Warna Mobil :"+ res.getString(6)+"\n");
                            buffer.append("Plat Mobil :"+ res.getString(7)+"\n");
                        }
                        showMessage("Data",buffer.toString());
                    }
                }
        );
    }
}
