package com.example.shop;

import org.ksoap2.SoapEnvelope;
import org.ksoap2.serialization.SoapObject;
import org.ksoap2.serialization.SoapSerializationEnvelope;
import org.ksoap2.transport.HttpTransportSE;

import android.os.Bundle;
import android.preference.PreferenceManager;
import android.app.Activity;
import android.content.SharedPreferences;
import android.view.Menu;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

public class Mycart extends Activity {
	ListView lv1;
	Button b1,b2,b3;
	
	
	String namespace="urn:demo";
	String method="cart";
	String soapaction="urn:demo/cart";
	
	String lid="";
	
	public static String[] pname,price,date;
	

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_mycart);
		lv1=(ListView)findViewById(R.id.listView1);
		b1=(Button)findViewById(R.id.button1);
		b2=(Button)findViewById(R.id.button2);
		b3=(Button)findViewById(R.id.button3);
		
		SharedPreferences sh=PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
		lid=sh.getString("lid", "");
		
		try
		{
			SoapObject sop=new SoapObject(namespace,method);
			sop.addProperty("lid",lid);
		
			SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
			sev.setOutputSoapObject(sop);
			
			HttpTransportSE htp=new HttpTransportSE(Login.url);
			htp.call(soapaction, sev);
			
			String res=sev.getResponse().toString();
			//Toast.makeText(getApplicationContext(),res, Toast.LENGTH_LONG).show();
			if(!res.equalsIgnoreCase("error")){
			
			 String k[]=res.split("\\&");
			 pname=new String[k.length];
			 price=new String[k.length];
			 date=new String[k.length];
			 for(int i=0;i<k.length;i++)
			 {
				 String a[]=k[i].split("\\#");
				 pname[i]=a[0];
				 price[i]=a[1];
				 date[i]=a[1];
			 }
			 
			// ArrayAdapter<String>ad=new ArrayAdapter<String>(getApplicationContext(), android.R.layout.simple_list_item_1,pname);
			 lv1.setAdapter(new CustomCon(getApplicationContext(), pname, price, date));
		}
		}
		catch(Exception e)
		{
			Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();	
		}
		
			
	}


}