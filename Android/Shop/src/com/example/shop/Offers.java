package com.example.shop;

import org.ksoap2.SoapEnvelope;
import org.ksoap2.serialization.SoapObject;
import org.ksoap2.serialization.SoapSerializationEnvelope;
import org.ksoap2.transport.HttpTransportSE;

import android.os.Build;
import android.os.Bundle;
import android.os.StrictMode;
import android.annotation.TargetApi;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

public class Offers extends Activity implements OnItemClickListener {
	ListView lv1;

	String namespace="urn:demo";
	String method="offer";
	String soapaction="urn:demo/offer";
	
	public static int pos;
	public static String[]pid,pname,price,ProductBrand,P_Offer,Sp_Offer,Discrip,From_Date,End_Date,Total_Price;
	
	@TargetApi(Build.VERSION_CODES.GINGERBREAD) @Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_offers);
		lv1=(ListView)findViewById(R.id.listView1);
		lv1.setOnItemClickListener(this);
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
		try
		{
			SoapObject sop=new SoapObject(namespace,method);
			SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
			sev.setOutputSoapObject(sop);
			
			HttpTransportSE htp=new HttpTransportSE(Login.url);
			htp.call(soapaction, sev);
			
			String res=sev.getResponse().toString();
			Toast.makeText(getApplicationContext(), res, Toast.LENGTH_LONG).show();
			String a[]=res.split("\\@");
			 pid=new String[a.length];
			 P_Offer=new String[a.length];
			 Sp_Offer=new String[a.length];
			 Discrip=new String[a.length];
			 From_Date=new String[a.length];
			 End_Date=new String[a.length];
			 Total_Price=new String[a.length];
			 pname=new String[a.length];
			 ProductBrand=new String[a.length];
			 price=new String[a.length];
			
			 
			 for(int i=0;i<a.length;i++)
			 {
				String k[]=a[i].split("\\#");
				pid[i]=k[0];			
				P_Offer[i]=k[2];
				Sp_Offer[i]=k[3];
				Discrip[i]=k[4];
                From_Date[i]=k[5];
				End_Date[i]=k[6];
				Total_Price[i]=k[7];
				pname[i]=k[8];
				ProductBrand[i]=k[9];
				price[i]=k[10];
				
				
			 }
			 
			// ArrayAdapter<String>ad=new ArrayAdapter<String>(getApplicationContext(), android.R.layout.simple_list_item_1,pname);
			 //lv1.setAdapter(ad);
			 
			 lv1.setAdapter(new Offersub(getApplicationContext(),pname,price));
			
			
		}
		catch(Exception e)
		{
			Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();	
		}
		
		}

	@Override
	public void onItemClick(AdapterView<?> arg0, View arg1, int arg2, long arg3) {
		// TODO Auto-generated method stub
		pos=arg2;
		Intent i=new Intent(getApplicationContext(),Prooffrdet.class);
		startActivity(i);
		
	}

	
}
