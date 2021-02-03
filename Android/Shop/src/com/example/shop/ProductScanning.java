package com.example.shop;

import java.util.Random;

import org.ksoap2.SoapEnvelope;
import org.ksoap2.serialization.SoapObject;
import org.ksoap2.serialization.SoapSerializationEnvelope;
import org.ksoap2.transport.HttpTransportSE;

import com.example.shop.R.string;

import android.R.integer;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.os.StrictMode;
import android.preference.PreferenceManager;
import android.annotation.TargetApi;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.ActivityNotFoundException;
import android.content.ContentValues;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.Button;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

@TargetApi(Build.VERSION_CODES.GINGERBREAD)
public class ProductScanning extends Activity implements OnItemClickListener{
	
	TextView tv1;
	ListView lv1;
	Button b1,b2;
	
	String namespace="urn:demo";
	String method="threshold";
	String soapaction="urn:demo/threshold";
	String method1="uploadCart";
	String soapaction1="urn:demo/uploadCart";
	String lid="";
	String t="";
	static final String ACTION_SCAN = "com.google.zxing.client.android.SCAN";
	String pid[];
	String[] price;
	public static String[] pname;
	String qid="";
	int pr=0;
	public int pos=0;
	String[] cpid,cprice,cpname,cartid;
	SQLiteDatabase sqd;
	@TargetApi(Build.VERSION_CODES.HONEYCOMB) @Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_product_scanning);
		tv1=(TextView)findViewById(R.id.textView2);
		lv1=(ListView)findViewById(R.id.listView1);
		b1=(Button)findViewById(R.id.button1);
		b2=(Button)findViewById(R.id.button2);
		lv1.setOnItemClickListener(this);
		sqd=openOrCreateDatabase("shopping", SQLiteDatabase.CREATE_IF_NECESSARY, null, null);
		sqd.execSQL("create table if not exists user_cart(cart_id integer primary key autoincrement,pid text,price text,pname text,uid text)");
		sqd.execSQL("delete from user_cart");
		try
		{
			if(android.os.Build.VERSION.SDK_INT>9)
			{
				StrictMode.ThreadPolicy policy=new StrictMode.ThreadPolicy.Builder().permitAll().build();
				StrictMode.setThreadPolicy(policy);
			}
		}
		catch(Exception e)
		{
			
		}
		SharedPreferences sh=PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
		lid=sh.getString("lid", "");
		
		t=getIntent().getStringExtra("thre");
		Toast.makeText(getApplicationContext(), t, Toast.LENGTH_LONG).show();
		pr=Integer.parseInt(sh.getString("thld", ""));
		tv1.setText(sh.getString("thld", ""));

		b1.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				try {
					Intent intent = new Intent(ACTION_SCAN);
					intent.putExtra("SCAN_MODE", "QR_CODE_MODE");
					startActivityForResult(intent, 0);
				} catch (ActivityNotFoundException anfe) {
					showDialog(ProductScanning.this, "No Scanner Found", "Download a scanner code activity?", "Yes", "No").show();
				}
				
			}
		});
		
		b2.setOnClickListener(new View.OnClickListener() {
		
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				
				
				
				try {
					Random rn=new Random();
					int a=rn.nextInt(1000000);
					int total=0;
					Cursor cr=sqd.rawQuery("select * from user_cart where uid='"+lid+"'", null);
					if(cr.getCount()>0){
						cr.moveToFirst();
						String products="";
						do{
							products+=cr.getString(1)+"#"+cr.getString(2)+"$";
							total+=cr.getInt(2);
						}while(cr.moveToNext());
						
						cr.close();
						uploadCart(products, a+"",total+"");
					}
				} catch (Exception e) {
					// TODO: handle exception
					Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();
				}
				
			}
		});
	}

	private static AlertDialog showDialog(final Activity act, CharSequence title, CharSequence message, CharSequence buttonYes, CharSequence buttonNo) {
		AlertDialog.Builder downloadDialog = new AlertDialog.Builder(act);
		downloadDialog.setTitle(title);
		downloadDialog.setMessage(message);
		downloadDialog.setPositiveButton(buttonYes, new DialogInterface.OnClickListener() {
			public void onClick(DialogInterface dialogInterface, int i) {
				Uri uri = Uri.parse("market://search?q=pname:" + "com.google.zxing.client.android");
				Intent intent = new Intent(Intent.ACTION_VIEW, uri);
				try {
					act.startActivity(intent);
				} catch (ActivityNotFoundException anfe) {

				}
			}
		});
		downloadDialog.setNegativeButton(buttonNo, new DialogInterface.OnClickListener() {
			public void onClick(DialogInterface dialogInterface, int i) {
			}
		});
		return downloadDialog.show();
	}
	
	public void onActivityResult(int requestCode, int resultCode, Intent intent) {
		if (requestCode == 0) {
			if (resultCode == RESULT_OK) {
				String contents = intent.getStringExtra("SCAN_RESULT");
				String format = intent.getStringExtra("SCAN_RESULT_FORMAT");

				viewProduct(contents);
			}
		}
	}
	private void viewProduct(String id) {
		try
		{
			SoapObject sop=new SoapObject(namespace,method);
			
			sop.addProperty("Qid", id);
			
			SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
			sev.setOutputSoapObject(sop);
			
			HttpTransportSE htp=new HttpTransportSE(Login.url);
			htp.call(soapaction, sev);
			
			String res=sev.getResponse().toString();
			
			Log.d("result======", res);
			
			String k[]=res.split("\\$");
			pid=new String[k.length];
			price=new String[k.length];
			pname=new String[k.length];
			for(int i=0;i<k.length;i++)
			{
				
				String a[]=k[i].split("\\#");
				pid[i]=a[0];
				price[i]=a[1];
				pname[i]=a[2];
				if(pr>=Integer.parseInt(price[i])){
				ContentValues cv=new ContentValues();
				cv.put("pid", pid[i]);
				cv.put("pname", pname[i]);
				cv.put("price", price[i]);
				cv.put("uid", lid);
				sqd.insert("user_cart", null, cv);
				pr=pr-Integer.parseInt(price[i]);
				}
				else{
					Toast.makeText(getApplicationContext(), "no balance", Toast.LENGTH_LONG).show();
				}
			}
			
			SharedPreferences sh=PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
			Editor e=sh.edit();
			e.putString("thld", pr+"");
			e.commit();
			tv1.setText(pr+"");
			view_cart();
		}
		catch(Exception e)
		{
			Log.d("errer", e.toString());
			Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();	
		}
	}
	
	private void view_cart() {
		Cursor cr=sqd.rawQuery("select * from user_cart where uid='"+lid+"'", null);
		Toast.makeText(getApplicationContext(), cr.getCount()+"", Toast.LENGTH_LONG).show();
		if(cr.getCount()>0){
			cr.moveToFirst();
			cpid=new String[cr.getCount()];
			cprice=new String[cr.getCount()];
			cpname=new String[cr.getCount()];
			cartid=new String[cr.getCount()];
			int k=0;
			do{
				cartid[k]=cr.getString(0);
				cpid[k]=cr.getString(1);
				cprice[k]=cr.getString(2);
				cpname[k]=cr.getString(3);
				k++;
			}while(cr.moveToNext());
			lv1.setAdapter(new Scanresult(getApplicationContext(), cpname, cprice));
			cr.close();
		}
	}
	private void uploadCart(String items,String gen,String total) {
		try {
			SoapObject sop=new SoapObject(namespace,method1);
			
			sop.addProperty("items", items);
			sop.addProperty("gen", gen);
			sop.addProperty("total", total);
			sop.addProperty("lid", lid);
			SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
			sev.setOutputSoapObject(sop);
			
			HttpTransportSE htp=new HttpTransportSE(Login.url);
			htp.call(soapaction1, sev);
			String res=sev.getResponse().toString();
			Toast.makeText(getApplicationContext(), res, Toast.LENGTH_LONG).show();
			Intent i=new Intent(getApplicationContext(), Purchasecodegeneration.class);
			i.putExtra("gen", gen);
			startActivity(i);
		} catch (Exception e) {
			// TODO: handle exception
		}
	}

	@TargetApi(Build.VERSION_CODES.HONEYCOMB) @Override
	public void onItemClick(AdapterView<?> arg0, View arg1, int arg2, long arg3) {
		// TODO Auto-generated method stub
		pos=arg2;
		sqd=openOrCreateDatabase("shopping", SQLiteDatabase.CREATE_IF_NECESSARY, null, null);
		sqd.execSQL("create table if not exists user_cart(cart_id integer primary key autoincrement,pid text,price text,pname text,uid text)");
		
		Toast.makeText(getApplicationContext(), cartid[pos]+":"+cpname[pos], Toast.LENGTH_LONG).show();
		//sqd.delete("user_cart","cart_id=?", new String[]{cartid[pos]});
		sqd.execSQL("delete from user_cart where cart_id='"+cartid[pos]+"'");
		
		view_cart();
	}
	
}
